$(function(){
    const $adicionarAoCarrinho = $('.btn-adicionar-carrinho');
    $adicionarAoCarrinho.click(ev =>{
        ev.preventDefault();
        const $this = $(ev.target);
        const id = $this.closest('.item-produto').data('key');
        console.log(id);
        $.ajax({
            method: 'POST',
            url: $this.attr('href'),
            data: {id},
            success: function (){
                console.log(arguments);
            }
        })
    })
});