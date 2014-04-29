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
define('DB_NAME', 'espacosaudesorriso'); // local
//define('DB_NAME', 'espacosaudesor');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'Admin'); // local
//define('DB_USER', 'espacosaudesor');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '1234'); // local
//define('DB_PASSWORD', 'ess@290414');

/** nome do host do MySQL */
define('DB_HOST', 'localhost'); // local
//define('DB_HOST', '186.202.152.92');

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
define('AUTH_KEY',         'FRySB&Eei,5LQ,7w/VJy31HmY#cwVUxV{Y%;`$:oif,UK5(.!#^Ha*]IxZ}aohb*');
define('SECURE_AUTH_KEY',  'Y,R%y%ESQ^7<xd&:808Ulch6&Q>`i.OAmSGzg1q0!jG;nacr^r1z5/R5I]MNQ{,b');
define('LOGGED_IN_KEY',    ';ZVg449iFT/lkfv`9F<`&P<bJ-3YBsBf!%9>MHc^]qX]n{;a0~hQ~~}M~DB(opsh');
define('NONCE_KEY',        '/e4o+08;DI~&;XxU=jTimPaM}S(7Bri&rw?SR{&8vKI:egPe#|YSZGaUNu~+ kR>');
define('AUTH_SALT',        '[[3FYl&Jj@zamOvVW|R}{. @SP]OAI`nejVy =Wrg$W)dZwjJ9qZjKT.U;`(T1N#');
define('SECURE_AUTH_SALT', ':mFprEGOSHYfg=r9`LY9(pR^saH6^8RxgXZp=f!&4 :HDa@mqW:GTl)fpro%^j@W');
define('LOGGED_IN_SALT',   'ReE52K!3zXw}20*uiV+Ac:OSn3Fx|pBZ8O Cz&EB>pouJ)nzU6f?(+j|We],^>w%');
define('NONCE_SALT',       't<];+1}S2(Qwz1Lh#2cNqGT{t)@2+{|S<-5tph?y~.|;Ol2uY=]Z}EP!,3MA`[Kw');

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
