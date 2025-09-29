<?php
/**
 * Adiciona a configuração de SMTP apenas se o site NÃO estiver no ambiente local.
 * Altere 'viatrop.local' para o domínio exato que você usa no LocalWP.
 */
if ( isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] !== 'viatrop.local' ) {
    add_action( 'phpmailer_init', 'configurar_smtp' );
}

function configurar_smtp( $phpmailer ) {
    $phpmailer->isSMTP();

    //Configurações do servidor SMTP
    $phpmailer->Host      = defined('SMTP_HOST') ? SMTP_HOST : '';            //Substitua pelo seu servidor SMTP
    $phpmailer->SMTPAuth  = true;                                             //Habilita a autenticação SMTP
    $phpmailer->Port      = defined('SMTP_PORT') ? SMTP_PORT : 587;           //Ou 465 para SSL
    $phpmailer->Username  = defined('SMTP_USER') ? SMTP_USER : '';            //Seu e-mail ou usuario SMTP
    $phpmailer->Password  = defined('SMTP_PASS') ? SMTP_PASS : '';            //Sua senha

    Configurações de criptografia e remetente
    $phpmailer->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : 'tls';    //Ou 'ssl' se estiver usando a porta 465
    $phpmailer->From       = defined('SMTP_FROM') ? SMTP_FROM : '';           //O e-mail que aparecerá como remetente
    $phpmailer->FromName   = defined('SMTP_NAME') ? SMTP_NAME : '';           //O nome que aparecerá como remetente
    $phpmailer->CharSet = 'UTF-8';
} 
// Fim da função configurar_smtp