function register(){
    window.location = 'register.php';
}

var addToCartModal = document.getElementById('addToCartModal');
    addToCartModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var itemId = button.getAttribute('data-id');
        var itemIdInput = addToCartModal.querySelector('#item_id');
        itemIdInput.value = itemId;
});