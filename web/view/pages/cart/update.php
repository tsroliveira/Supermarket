<?php
include_once('./view/pages/session.php');
$msg = !empty($msg) ? $msg : "";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function updateCart($pdid, $name, $pvalue, $tvalue, $qtde, $stock, $description, $id_pt)
{
    $item = array(
        'id'            => $pdid,
        'name'          => $name,
        'pvalue'        => $pvalue,
        'tvalue'        => $tvalue,
        'qtde'          => $qtde,
        'stock'         => $stock,
        'description'   => $description,
        'id_pt'         => $id_pt
    );
    if (count($_SESSION['cart']) == 0) {
        if ($qtde <= $stock){
            if ($_POST['op'] == 'add') {
                $_SESSION['cart'][$pdid] = $item;
            }
            else {
                return $msg = '<div class="alert alert-dark" role="alert">You don\'t have this product in your shopping cart.</div>';
            }
        }
        else {
            return $msg = '<div class="alert alert-dark" role="alert">The requested quantity is greater than our stock of this product.</div>';
        }
    }
    else {
        foreach ($_SESSION['cart'] as $row) {
            if ($row['id'] === $pdid) {

                if ($_POST['op'] == 'add') {
                
                    $item['qtde'] += $row['qtde'];
                    if ($item['qtde'] <= $stock){
                        $_SESSION['cart'][$pdid] = $item;
                    }
                    else {
                        return $msg = '<div class="alert alert-dark" role="alert">The requested quantity is greater than our stock of this product.</div>';
                    }
                }
                if ($_POST['op'] == 'rmv') {
                    $item['qtde'] = $row['qtde'] - $item['qtde'];

                    if ($item['qtde'] > 0) {
                        $_SESSION['cart'][$pdid] = $item;
                    }
                    else if ($item['qtde'] == 0) {
                        unset($_SESSION['cart'][$pdid]);
                    }
                    else {
                        return $msg = '<div class="alert alert-dark" role="alert">The requested quantity is not value, please review the operation and try again.</div>';
                    }
                }
            }
            else {
                $_SESSION['cart'][$pdid] = $item;
            }
        }
    }
}

$pdid           = $_POST['pdid'];
$name           = $_POST['name'];
$pvalue         = $_POST['pvalue'];
$tvalue         = $_POST['tvalue'];
$qtde           = $_POST['qtde'];
$stock          = $_POST['stock'];
$description    = $_POST['description'];
$id_pt          = $_POST['id_pt'];

$msg = updateCart($pdid, $name, $pvalue, $tvalue, $qtde, $stock, $description, $id_pt);
