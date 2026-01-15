
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
 * Registration Agree to Terms Or Service
 */

const checkboxTermsOfUse = document.getElementById('checkboxTermsOfUse');

const myForm = document.getElementById('user-register-form');

myForm.addEventListener('submit', function (event) {
    // 1. Prevent the default form submission
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
                form.submit();
            }
        });
    } else {
        form.submit();
    }
});