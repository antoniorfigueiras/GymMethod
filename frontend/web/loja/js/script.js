$(function(){
    const $carrinhoQuantidade = $('#carrinho-quantidade');
    const $adicionarAoCarrinho = $('.btn-adicionar-carrinho');
    const $itemQuantidades = $('.item-quantidade');
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
                console.log(arguments)
                $carrinhoQuantidade.text(parseInt($carrinhoQuantidade.text() || 0) + 1);
            }
        })
    })

    $itemQuantidades.change(ev => {
        const $this = $(ev.target);
        let $tr = $this.closest('tr');
        const $td = $this.closest('td');
        const id =
            $tr.data('id');
        $.ajax({
            method: 'post',
            url: $tr.data('url'),
            data: {id, quantidade: $this.val()},
            success: function (result){
                $carrinhoQuantidade.text(result.quantidade);
                $td.next().text(result.preco);
            }
        })
    })
});