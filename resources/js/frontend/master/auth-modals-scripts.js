// Close registration modal after successfull user registration
document.addEventListener('hideModelAfterRegistration', () => {
    $("#signup-modal").modal('hide');
});

// Close login modal after successfull user registration
document.addEventListener('hideModelAfterLogin', () => {
    $("#signin-modal").modal('hide');
});

