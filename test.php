<?php

// require_once 'db.php';

// try {
    
//     // get products
//     $tri = $_GET['tri'] ?? 'id';
//     $stmt = $conn->prepare("SELECT * FROM products ORDER BY $tri");
//     $stmt->execute();
//     $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // get media

//     $stmt2 = $conn->prepare("SELECT product_id, media_url , is_main FROM product_media");
//     $stmt2->execute();
//     $medias = $stmt2->fetchAll(PDO::FETCH_ASSOC);

//     // get product & categories

//     $stmt3 = $conn->prepare("SELECT pc.product_id, c.name FROM categories as c JOIN product_category as pc ON c.id = pc.category_id");
//     $stmt3->execute();
//     $product_categories = $stmt3->fetchAll(PDO::FETCH_ASSOC);

//     // get categories
//     $stmt4 = $conn->prepare("SELECT name FROM categories");
//     $stmt4->execute();
//     $categories = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        tr{
            border-bottom: 1px solid #ccc;
        }   
        th{
            text-align: start;
            padding: 2px 8px;
            font-weight: 100;
            color: gray;
            white-space: nowrap;
        }
        
        td{
            padding: 10px 8px;
            white-space: nowrap;
        }
        td img{
            height: 20px;
        }
        td:last-child{
            display: flex;
            justify-content: center;
            gap: 2px;
        }
        i{
            cursor: pointer;
            margin: 2px;
        }
        a:first-of-type i{
            color: blue;
        }
        a:last-of-type i{
            color: red;
        }

        /* pour les champ de modification */

        textarea{
            width: 100%;

        }
        input{
            width: 100%;
        }
        

    </style>
</head>
<body>   
    


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'p.php',
                type: 'GET',
                data: {
                    tri: 'id'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Erreur: " + error);
                }
            })
            let text;
            $('.input').dblclick(function(){
                text = $(this).text().trim();
                $(this).html(`<input type='text' value='${text}'>`);
                $(this).children('input').focus();
                
            })
            $('.textarea').dblclick(function(){
                text = $(this).text().trim();
                $(this).html(`<textarea type='text'>${text}</textarea>`);
                $(this).children('textarea').focus();
            })
            $('.select').dblclick(function(){
                text = $(this).text().trim();
                console.log(text)
                $(this).html(
                    `<select >
                        <?php
                            foreach ($categories as $category){
                                echo "<option>{$category['name']}</option>";
                            }
                        ?>
                    </select>`
                )
                $(this).children('select').children('option').each(function () {
                    if ($(this).text() === text.trim()) {
                        $(this).prop('selected', true);
                    }
                })
                $(this).children('select').focus();
            })
            $(document).on('blur', 'td input , td textarea, select', function(){
                let newText = $(this).val().trim();
                let td = $(this).closest('td');
                let confirmation = (text===newText)?false:confirm("Enregister les modification?");
                if (newText.trim() !== '' && confirmation){
                    if ($(td).hasClass("T_product")){
                        let action = 'modifier';
                        let table = 'product';
                        let idProd = $(this).closest('tr').data('id');
                        let colonne = td.data('colonne');
                        newText = (colonne==='is_on_promotion')?newText.toUpperCase() : newText;
                        
                        $.ajax({
                            url: 'p.php',
                            type: 'POST',
                            data: {
                                action: action,
                                table: table,
                                id: idProd,
                                colonne: colonne,
                                value: newText
                            },
                            success: function(response) {
                                alert("Réponse du serveur: " + response);
                            },
                            error: function(xhr, status, error) {
                                console.error("Erreur: " + error);
                                alert("Une erreur est survenue lors de la modification");
                            }
                        });
                    }else if($(td).hasClass('T_categorie')){
                        let action = 'modifier';
                        let table = 'product_category';
                        let idProd = $(this).closest('tr').data('id');

                        $.ajax({
                            url: 'p.php',
                            type: 'POST',
                            data: {
                                action: action,
                                table: table,
                                id: idProd,
                                value: newText
                            },
                            success: function (response){
                                alert("Réponse du serveur: " + response);
                            },error: function(xhr, start, error){
                                console.error("Erreur: " + error);
                                alert("Une erreur est survenue lors de la modification");
                        }
                    });
                }else{
                    newText = text;
                }
                td.html(newText);
            }});
            $(".tri").click(function(){
                let colonne = $(this).data('colonne');
                $.ajax({
                    url: 'p.php',
                    type: 'POST',
                    data: {
                        action: 'tri',
                        tri: colonne
                    },
                    success: function(response){
                        $('body').html(response);
                    },
                    error: function(xhr, status, error){
                        console.error("Erreur: " + error);
                        alert("Une erreur est survenue lors du tri");
                    }
                });
            })
        });
    </script>
</body>
</html>