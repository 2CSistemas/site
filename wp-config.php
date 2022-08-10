<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp2csistemas' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'wp2csistemas' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'X7#?c#e*OQ5' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql741.umbler.com:41890' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B^]qPrqH,Ho(|ur^8:uoDw5}gRacgRPZ4WPPDUs]rOzJ^s;N3n#8mPCt-a=ft{Eh' );
define( 'SECURE_AUTH_KEY',  'y&$2dL~1_)[qv.2N} +obUNN*LLzp%`QcDj4J~#Ew._N0_qk;2[Kio8mpFN)jEF9' );
define( 'LOGGED_IN_KEY',    'K({s 6x ooAg c9Vpwj$!o[E3IW&Dv:E-o}ERo^di:g3#Ta n~]p*~TM-oWoxKQq' );
define( 'NONCE_KEY',        '7P2e_JxyHk5kd0P@I C/azk>$$&dIj4-x%BXg5JsK:HPwrR`Z+f0o)YCw8Q5T3dn' );
define( 'AUTH_SALT',        'mKh zs`Tk}dm7~gG8T)t|sz3uVMvy]j!,kg.D5iUn=(,;DKLy(+1J!I,]8Z:^My<' );
define( 'SECURE_AUTH_SALT', 'uWfa)[PXh|T8z+Ozx=1`^~nx(9YDgO[ON_+ow=h&l)Q43<RN3eZOJ)PNyvq).uc_' );
define( 'LOGGED_IN_SALT',   '`{ XH{1anTWPbK%<o`,F|KEy4}xRWWiI LI>}`;QcbZj|jaNp(fM*=[k^XwX!K/k' );
define( 'NONCE_SALT',       'z(w_5mquk)l.3hy-relG|MgoNaKj(eIK%15CyZhQcK;F|WBf0LxkXQ,~~hr#l6<h' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
