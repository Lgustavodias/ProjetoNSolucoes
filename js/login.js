    // Script para mostrara senha
    var input1 = document.querySelector('#senha');
    var span1 = document.querySelector('#visiblePass');

    span1.addEventListener('click', function() {
        input1.type = input1.type == 'text' ? 'password' : 'text';
    });
