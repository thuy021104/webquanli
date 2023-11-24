const scriptURL = 'https://script.google.com/macros/s/AKfycbxQ0wxfNUvgZzmcRNQM9hD6ltroy4v0hHix_XvnOZ4bJftZdqs81Z8yCQ/exec'
const form = document.forms['google-sheet']

form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => window.alert("Your request has been delivered to my gmail."))
    .catch(error => console.error('Error!', error.message))
})