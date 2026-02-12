/**
 * @file This file contains the main script for the Kumbuka NoteBook application.
 * @author Andrew Nite
 * @since [Creation Date, e.g., 2025-01-01]
 * @version 1.0.0-alpha
 * @description
 * This script handles the main UI and events for Kumbuka.
 */

/**
 * Fetches an HTML partial and inserts it into a target DOM element.
 * 
 * @param {string} url - The URL of the HTML content to fetch.
 * @param {string} targetElementId - The ID of the parent element to insert the HTML into.
 */
async function loadHtmlBlock(url, targetElement) {
    try {
        // 1. Fetch the HTML content from the specified URL
        const response = await fetch(url);

        // Check if the request was successful
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        // 2. Read the response body as text (HTML string)
        const htmlText = await response.text();

        // 3. Find the target parent element in the current document
        // const targetElement = document.getElementById(targetElementId);

        if (targetElement) {
            // 4. Insert the fetched HTML string into the parent element
            // This replaces any existing content within the target element
            targetElement.innerHTML = htmlText;
        } else {
            console.error(`Target element with ID "${targetElement}" not found.`);
        }

    } catch (error) {
        console.error("Could not load the HTML block:", error);
    }
}

/**
 * Load HTML block using data-* attribute tag
 */

const dataBlocks = document.querySelectorAll('[data-block-file]');

if (dataBlocks !== null) {
    dataBlocks.forEach(element => {
        let file = element.dataset.blockFile;
        loadHtmlBlock(file, element);
        element.addEventListener('click', (events) => {

        });
    });
}

/**
 * Registration Agree to Terms Of Service
 */

const checkboxTermsOfUse = document.getElementById('checkboxTermsOfUse');

const registerForm = document.getElementById('user-register-form');
if (registerForm !== null) {
    registerForm.addEventListener('submit', function (event) {
        // Prevent the default form submission
        event.preventDefault();
        const form = event.target;

        if (!checkboxTermsOfUse.checked) {
            Swal.fire({
                title: 'Accept Terms',
                input: 'checkbox',
                inputValue: 1, // default checked
                inputPlaceholder: 'I agree to the terms and conditions',
                inputValidator: (result) => {
                    return !result && 'You need to agree with T&C'
                }
            }).then((result) => {
                if (result.value) {
                    checkboxTermsOfUse.checked = true;
                    form.submit();
                }
            });
        } else {
            form.submit();
        }
    });
}

// Disable Submit button after click
const kmForms = document.querySelectorAll('[data-km="form"]');

if (kmForms !== null) {
    kmForms.forEach(element => {

        element.addEventListener('submit', (event) => {
            const form = event.target;
            const kmSubmitBtn = form.querySelector('[data-km="submit"]');
            const btnText = kmSubmitBtn.textContent;

            // Disable the button to prevent further clicks
            kmSubmitBtn.disabled = true;

            // Change the button text
            kmSubmitBtn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...`;

            setTimeout(() => {
                // Reset state if needed
                kmSubmitBtn.disabled = false;
                kmSubmitBtn.innerHTML = btnText;
            }, 3000);
        });
    });
}


/**
 * Change a URL query value using the URLSearchParams interface 
 * along with the history.pushState() and history.replaceState() methods.
 */
function updateUrlQueryParam(key, value) {
    // 1. Create a URL object based on the current window location
    const url = new URL(window.location.href);

    // 2. Access the searchParams property, which is a URLSearchParams object
    const searchParams = url.searchParams;

    // 3. Set the new value for the specified key
    // This method overwrites an existing parameter or adds a new one
    searchParams.set(key, value);

    // 4. Update the browser's history and URL without reloading the page
    // The first two arguments of replaceState are 'state' (can be null) and 'title' (ignored by modern browsers, can be empty string)
    // The third argument is the new URL
    window.history.replaceState(null, '', url.toString());
}

/**
 * A simple AJAX function for the Share feature
 */
const kmAjaxForms = document.querySelectorAll('[data-km-form="ajax"]');

if (kmAjaxForms !== null) {
    kmAjaxForms.forEach(form => {

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Stop page refresh
            const submitBtn = this.querySelector('[data-km="button"]');
            submitBtn.disabled = true;
            // Change the button text
            submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;

            const formData = new FormData(this);
            const fomrAction = this.action;

            fetch(fomrAction, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Helps CI4 detect AJAX
                }
            })
                .then(response => response.json())
                .then(data => {
                    $.BToasty({
                        title: "Shared",
                        body: data.message,
                        extra: data.status,
                        autoHide: false,
                        duration: 5000,
                        xbutton: true, // shows close button
                        position: "top_right",
                        // img: { // custom image
                        //     src: "/assets/images/logo.png", 
                        //     alt: "Kumbuka"
                        // }
                    });

                    if (data.status === 'success') {
                        // Update the CSRF token for the next submission
                        if (data.token) {
                            const csrfTokenInputs = document.querySelectorAll("input[name='csrf_kumbuka_key']");
                            csrfTokenInputs.forEach(input => {
                                input.value = data.token;
                            });
                        }
                    }
                })
                .catch(error => console.error('Error:', error))
                .finally(() => {
                    submitBtn.innerHTML = `<i class="bi bi-bookmark-check-fill mr-0"></i>`;
                });
        });
    });
}

/**
 * Creating a function to add to Server-Sent Events (SSE) and then attach an EventListener.
 * The ID arugument passed in is used to find the right Element's button. 
 * 
 */
const markAsReadAndNotify = async (noticeId, url) => {

    const badge = document.getElementById('notif-badge');
    const toast = document.getElementById('km-notice-' + noticeId);
    const noticeDismissBtn = toast.querySelectorAll('[data-dismiss="toast"]');
    
    if (noticeDismissBtn !== null) {
        noticeDismissBtn.forEach(button => {
            button.addEventListener('click', async () => {

                // Grab the token from the meta tag
                const csrfMeta = document.querySelector('meta[name="X-CSRF-TOKEN"]');
                let token = csrfMeta.getAttribute('content');

                try {
                    // Fire the AJAX request (using Fetch API)
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            id: noticeId,
                            is_read: true,
                        })
                    });

                    const result = await response.json();

                    if (result.csrf_token) {
                        csrfMeta .setAttribute('content', result.csrf_token);
                    }

                    // update button & hide badge
                    if (result.success) {
                        // noticeDismissBtn.classList.add('btn','btn-outline-danger');
                        // noticeDismissBtn.innerText = 'Marked as Read';
                        badge.innerText = 0;
                        badge.classList.add('d-none');
                    }
                    
                } catch (error) {
                    console.error('AJAX Error:', error);
                }
            }, { once: true }); // Prevents stacking listeners
        });
    }
}


