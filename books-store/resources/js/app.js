require('./bootstrap');

// Delete Comfirmation
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
});

const handleDeleteButtons = () => {
    document.querySelectorAll('.delete--button').forEach(b => {
        b.addEventListener('click', () => {
            const modal = document.querySelector('#confirm-modal');
            const body = document.querySelector('body');
            modal.style.display = 'flex';
            modal.style.top = window.scrollY + 'px';
            body.style.overflow = 'hidden';
            const form = modal.querySelector('form');
            form.setAttribute('action', b.dataset.action);
        })
    });
}


// Manage photos
const photoInput = `
    <button type="button" class="btn btn-danger">-</button>
    <input type="file" class="form-control mt-2" name="book_photo[]">
`;
window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.add--photo')) {
        const addPhotoButton = document.querySelector('.add--photo');
        const inputPlaceholder = document.querySelector('.book--photos');
        addPhotoButton.addEventListener('click', () => {
            const span = document.createElement('span');
            span.innerHTML = photoInput;
            inputPlaceholder.appendChild(span);
            span.querySelector('button').addEventListener('click', () => {
                span.remove();
            })
        })
    }
});

// Authors List

window.addEventListener('DOMContentLoaded', () => {

    if (document.querySelector('#sort-select')) {
        const url = document.querySelector('#authors--list').dataset.url;
        document.querySelector('#sort-select').addEventListener('change', e => {
            document.querySelector('#authors--list').innerHTML = '<div class="loader"></div>';
            let sort;
            switch (e.target.value) {
                case 'asc':
                    sort = '?sort=name_asc';
                    break;
                case 'desc':
                    sort = '?sort=name_desc';
                    break;
                case 'new_asc':
                    sort = '?sort=new_asc';
                    break;
                case 'new_desc':
                    sort = '?sort=new_desc';
                    break;
                default:
                    sort = '';
            }
            axios.get(url + sort)
                .then(response => {
                    document.querySelector('#authors--list').innerHTML = response.data.html;
                    console.log('ziureti butonus')
                    handleDeleteButtons();
                })
        })

    }


    if (document.querySelector('#authors--list')) {
        const url = document.querySelector('#authors--list').dataset.url;
        axios.get(url + '?sort=name_desc')
            .then(response => {
                document.querySelector('#authors--list').innerHTML = response.data.html;
                console.log('ziureti butonus')
                handleDeleteButtons();
            })

    }
});