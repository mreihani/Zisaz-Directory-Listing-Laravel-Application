// Hide toast message after certain amount of time
document.addEventListener('showToaster', () => {
    setTimeout(() => document.getElementById('toastBody').style.display = 'none', 5000);
});