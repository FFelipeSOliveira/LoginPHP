function mascara(){
    $(document).ready(function(){
        $("#cpf").mask("000.000.000-00")
        $("#telefone").mask("(00) 00000-0000")         
        var options = {
            translation: {
                'A': {pattern: /[A-Z]/},
                'a': {pattern: /[a-zA-Z]/},
                'S': {pattern: /[a-zA-Z0-9]/},
                'L': {pattern: /[a-z]/},
            }
        }
    })
}