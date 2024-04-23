// Close registration modal after successfull user registration
document.addEventListener('hideModelAfterRegistration', () => {
    $("#signup-modal").modal('hide');
});

// Close login modal after successfull user registration
document.addEventListener('hideModelAfterLogin', () => {
    $("#signin-modal").modal('hide');
});

// show login modal on login route
document.addEventListener('showLoginModal', (e) => {
    if(e.detail.showModal) {
        const modal = new bootstrap.Modal('#signin-modal')
        modal.show()
    }
});

