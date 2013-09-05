<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'espacosaudesorriso');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'Admin');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '1234');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'P,=]|te//Y)gZxrmZQicYWH}p!sD|?S7~O=91EeX!8{9?%V(uu}sg/jMj&xsvcg+');
define('SECURE_AUTH_KEY',  ')_f]/LcBxxqgcI}BlF#z]*)H$-$NaAe:W`+.Biy8feiFggT2L4>m8E8W;@T)3H_F');
define('LOGGED_IN_KEY',    '<G_7V.+7R/Q)G_%#{2KJH2#)36<AjB0/z4R+U-mB[b+hZI4~JHd&D~<Et4sNO}Ob');
define('NONCE_KEY',        '#,Cf/dx#H<j(;Y@U%nCLa>(EnyO{P`4HS4q~p&C.9 E-`]%/Q!yMm3V)s3F(JFb{');
define('AUTH_SALT',        'j }oH:~Q6P~y`awmtbX@y<PJ6O&{5hcZ=UoBZ?T;4N6yc.,r+&~)z/LbD??aq[H1');
define('SECURE_AUTH_SALT', 'T ~w0pQ+BpR5i=^~^8y}$Va.gTD|eDq7G )H&QR.X9z&1~I<GhngxdIr[!PgR)V4');
define('LOGGED_IN_SALT',   '5cYv:T%)&:wGp2A^Z!sOQ4w,jK}u(eH23rEKSO S{hft7ah (>UpwJ[GHX#a&AT.');
define('NONCE_SALT',       'jfFZ<l?4?QHj5:8(`V=Hxy6LPmqv6P$#toU4HO6Sl#<P6,HgDO$]>p2GAd,_txct');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
