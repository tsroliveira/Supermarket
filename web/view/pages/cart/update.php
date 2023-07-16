<?php
  #No Concluded
  $msg = "";
  include_once('./view/pages/session.php');

  if (!isset($_SESSION['carrinho'])) {
      $_SESSION['carrinho'] = array();
  }

  function adicionarProdutoAoCarrinho($produto) {
      $_SESSION['carrinho'][] = $produto;
  }

  function removerProdutoDoCarrinho($indice) {
      if (isset($_SESSION['carrinho'][$indice])) {
          unset($_SESSION['carrinho'][$indice]);
          $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
      }
  }

  function listarProdutosNoCarrinho() {
      return $_SESSION['carrinho'];
  }
  
  adicionarProdutoAoCarrinho($produto);

  $produtosNoCarrinho = listarProdutosNoCarrinho();

  foreach ($produtosNoCarrinho as $produto) {
      echo 'Produto: ' . $produto['nome'] . ' | Preço: R$' . $produto['preco'] . '<br>';
  }

  // Remover um produto do carrinho pelo índice
  removerProdutoDoCarrinho(0);

  $produtosNoCarrinho = listarProdutosNoCarrinho();

  foreach ($produtosNoCarrinho as $produto) {
      echo 'Produto: ' . $produto['nome'] . ' | Preço: R$' . $produto['preco'] . '<br>';
  }

?>
