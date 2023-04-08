$(document).ready(function() {
    $('#myTable').DataTable({
        "pageLength": 20, // altere para 5, 10, 15 ou 20 para mudar a quantidade de itens por página
        "searching": false, // opção para remover a caixa de pesquisa
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros disponíveis",
            "infoFiltered": "(filtrado de _MAX_ registros totais)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            }
        }
    });
    
    const deleteLink = document.getElementById('delete-account');
    deleteLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (confirm('Tem certeza que deseja deletar sua conta?')) {
            document.getElementById('delete-form').submit();
        }
    });
});




