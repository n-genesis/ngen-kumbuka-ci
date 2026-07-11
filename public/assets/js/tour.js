const kumbukaIntro = introJs.tour().setOption("dontShowAgain", true).setOptions({
    // 1. Prevents closing when clicking the dark background overlay
    exitOnOverlayClick: false,

    // 2. Prevents closing when pressing the 'Escape' key
    exitOnEsc: false,

    // 3. Optional: Hide the "Skip" (X) button entirely so they can't close it manually
    showStepNumbers: false,
    hideCloseButton: true,
    steps: [{
        helperElementPadding: 0,
        title: 'Hey, welcome',
        intro: '<img src="./assets/images/kuma-be-kind.webp" class="img-fluid"><p class="text-center">Do you want a short tour to get started?</p>',
    },
    {
        element: document.querySelector('#dropdownMenuButton'),
        title: 'Your Account',
        intro: 'Here you can manage your Profile info, account, and privacy settings.'
    },
    {
        element: document.getElementById('kumbuk-logo-n-title'),
        title: "SideNote: Did you know?",
        intro: "It means <b><em>*'to take note'</em></b> or <b><em>'to remember')</em></b>. Kinda cool don't you think?<br />*<small>Swahili</small>",
    },
    {
        element: document.getElementById('quick-pick-dashboard'),
        title: 'HomeSpot Dashboard',
        intro: "Here you can see new posts by users you're following, updates about your followers, and <i>Read Breaking Nues aboot Kumbuka</i>",
        position: 'left',
    },
    {
        element: document.getElementById('request-form'),
        title: 'Want to be A Moderator',
        intro: "Want to be part of the super kool-and-neet Ultra Nify Modderator club?",
        position:'right',
    }]
});



kumbukaIntro.onchange(function (targetElement) {
    const iterator = this._steps.keys();
    let currentKey = iterator.next().value;
    let phrase = this._steps[currentKey].intro;
    // If Tour is on the first step
    if (currentKey === 0) {
        // const utterance = new SpeechSynthesisUtterance(phrase);
        // window.speechSynthesis.speak(utterance);
    }
});

kumbukaIntro.start();



