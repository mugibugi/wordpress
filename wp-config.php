<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'dbwordpresstest');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_!D[h=9&%$6&eE$M5?i!]1K5$3N1/x/QB2jBZnB.3BvFNMo&/f5U-IoG=ioKs-;{');
define('SECURE_AUTH_KEY',  'm*2Z@&>b)f1;XS7~_cG([<R%W[OnrP_|/@1OaRO &k$`]C`LiWIN>;3HZ>Eq;-]x');
define('LOGGED_IN_KEY',    'H2Znti-&MNG:V;!gzTmc3KCEr%|ed,$^nwlv|Le;6KUPTG>0CdmG$r;Z,5p5,v3_');
define('NONCE_KEY',        '`| !HA5O-OJ:`gG*s=Xu82SPRl;O[cyyB35}:XRuA<#7`+MH3oOsUjBh/sl<7$N}');
define('AUTH_SALT',        ',1zAV>G> +@QMw!5s%mx =Vv6&|^.%*/MT<Ur1McVpd^Yq$yT=_8l;0V:xJ6l-nM');
define('SECURE_AUTH_SALT', '0ao7X#p@{h 0][,k0eTtOb)l.:ze:6^O~ukGZ_+D+r-wQL8YK/G~P?j)@pIMW)s.');
define('LOGGED_IN_SALT',   ':kJd3WXHpBKt^pV`.nD9RD(Rt?Um?%&(Lm|b$1]xaduApidg2>0.-0MO$15E0c{4');
define('NONCE_SALT',       '%Gx!nt-l:I=)&@9$VI_V}%C7gxc=1[-JEr.sH.OMoX>s~x:hQ~<7Xj[9_ @*kk0d');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');