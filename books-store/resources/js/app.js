require('./bootstrap');




window.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector('body');

    if (document.querySelector('.cancel--confirm--button')) {
        document.querySelector('.cancel--confirm--button')
            .addEventListener('click', () => {
                body.style.overflow = 'auto';
                const modal = document.querySelector('#confirm-modal');
                modal.style.display = 'none';
            })
    }

    document.querySelectorAll('.delete--button').forEach(b => {
        b.addEventListener('click', () => {
            const modal = document.querySelector('#confirm-modal');
            modal.style.display = 'flex';
            modal.style.top = window.scrollY + 'px';
            body.style.overflow = 'hidden';
            const form = modal.querySelector('form');
            form.setAttribute('action', b.dataset.action);
        })
    });

});