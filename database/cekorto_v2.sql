-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2024 at 05:27 PM
-- Server version: 11.4.2-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekorto_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Teuku Rizky', 'trxcode21@gmail.com', 'TrxMod21X', NULL, '66e56cf979b541726311673.png', '$2y$12$Nj9eBwU8fmoxXTUG57wr3uU3qolTfE4YRIlMMmP3SfY5yAMLGnGLK', NULL, NULL, '2024-09-15 08:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `click_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(2, 'trxcode21@gmail.com', '234621', 0, '2024-09-15 08:17:53', NULL),
(3, 'trxcode21@gmail.com', '520392', 0, '2024-09-15 08:54:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('GeneralSetting', 'O:25:\"App\\Models\\GeneralSetting\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"general_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:58:{s:2:\"id\";i:1;s:9:\"site_name\";s:12:\"Sistem Pakar\";s:8:\"cur_text\";s:3:\"IDR\";s:7:\"cur_sym\";s:2:\"Rp\";s:10:\"email_from\";s:20:\"rizky@trxmod21x.tech\";s:15:\"email_from_name\";s:11:\"Teuku Rizky\";s:14:\"email_template\";s:5883:\"<html>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n<title>\r\n</title>\r\n<style type=\"text/css\">\r\n	.ReadMsgBody {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass,\r\n	.ExternalClass p,\r\n	.ExternalClass span,\r\n	.ExternalClass font,\r\n	.ExternalClass td,\r\n	.ExternalClass div {\r\n		line-height: 100%;\r\n	}\r\n	html {\r\n		width: 100%;\r\n	}\r\n	body {\r\n		-webkit-text-size-adjust: none;\r\n		-ms-text-size-adjust: none;\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n	table {\r\n		border-spacing: 0;\r\n		table-layout: fixed;\r\n		margin: 0 auto;\r\n		border-collapse: collapse;\r\n	}\r\n	table table table {\r\n		table-layout: auto;\r\n	}\r\n	.yshortcuts a {\r\n		border-bottom: none !important;\r\n	}\r\n	img:hover {\r\n		opacity: 0.9 !important;\r\n	}\r\n	a {\r\n		color: #0087ff;\r\n		text-decoration: none;\r\n	}\r\n	.textbutton a {\r\n		font-family: \"open sans\", arial, sans-serif !important;\r\n	}\r\n	.btn-link a {\r\n		color: #ffffff !important;\r\n	}\r\n	@media only screen and (max-width: 480px) {\r\n		body {\r\n			width: auto !important;\r\n		}\r\n		*[class=\"table-inner\"] {\r\n			width: 90% !important;\r\n			text-align: center !important;\r\n		}\r\n		*[class=\"table-full\"] {\r\n			width: 100% !important;\r\n			text-align: center !important;\r\n		} /* image */\r\n		img[class=\"img1\"] {\r\n			width: 100% !important;\r\n			height: auto !important;\r\n		}\r\n	}\r\n\r\n</style>\r\n<table bgcolor=\"#030442\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"50\">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n					<tbody>\r\n						<tr>\r\n							<td align=\"center\" width=\"600\">\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n												<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">\r\n															This is a System Generated Email</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"35\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n																<a href=\"#\">\r\n																	<img style=\"display:block; line-height:0px; font-size:0px; border:0px; width: 240px;\" width=\"240px\" src=\"http://localhost:8000/assets/images/logo_icon/logo_dark.png\" alt=\"img\">\r\n																</a>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"40\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open Sans, Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">\r\n															Hello {{fullname}} ({{username}}) </td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n																<table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"20\" style=\" border-bottom:3px solid #0087ff;\">\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"30\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"left\" style=\"font-family: Open sans, Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">\r\n															{{message}}</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"preference-link\" align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n																© 2023 <a href=\"#\">{{site_name}}</a> &nbsp;. All Rights Reserved. </td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"60\"></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</html>\";s:12:\"sms_template\";s:43:\"hi {{fullname}} ({{username}}), {{message}}\";s:8:\"sms_from\";s:9:\"TrxMod21X\";s:10:\"push_title\";s:9:\"TrxMod21X\";s:13:\"push_template\";s:43:\"hi {{fullname}} ({{username}}), {{message}}\";s:10:\"base_color\";s:6:\"560285\";s:11:\"mail_config\";s:131:\"{\"name\":\"smtp\",\"host\":\"sandbox.smtp.mailtrap.io\",\"port\":\"2525\",\"enc\":\"tls\",\"username\":\"8a8c50d9549326\",\"password\":\"6c4f7b06b3a52b\"}\";s:10:\"sms_config\";s:768:\"{\"name\":\"twilio\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"--------------\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"ACf2faffdb00b7ff63bc940a49a41fb3b1\",\"auth_token\":\"d70293a4d1393984ea8fd3a1e451ac23\",\"from\":\"+14159094723\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}\";s:15:\"firebase_config\";s:313:\"{\"apiKey\":\"AIzaSyB95O17nkkIGWI5kEYBvwyDlcBswSWSkh8\",\"authDomain\":\"laravel-starter-3d1c3.firebaseapp.com\",\"projectId\":\"laravel-starter-3d1c3\",\"storageBucket\":\"laravel-starter-3d1c3.appspot.com\",\"messagingSenderId\":\"1066845175582\",\"appId\":\"1:1066845175582:web:23b0184233472aaae4530f\",\"measurementId\":\"G-LH8NX265N8\"}\";s:17:\"global_shortcodes\";s:128:\"{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}\";s:21:\"socialite_credentials\";s:380:\"{\"google\":{\"client_id\":\"197067784702-eia2uhjbl3mcd6r1kkdrdsj785soq7el.apps.googleusercontent.com\",\"client_secret\":\"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\",\"status\":0},\"facebook\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0},\"linkedin\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0}}\";s:17:\"available_version\";N;s:7:\"kyc_ver\";i:0;s:9:\"email_ver\";i:0;s:11:\"email_notif\";i:1;s:7:\"sms_ver\";i:0;s:9:\"sms_notif\";i:1;s:10:\"push_notif\";i:0;s:10:\"multi_lang\";i:0;s:9:\"force_ssl\";i:0;s:14:\"in_app_payment\";i:0;s:16:\"maintenance_mode\";i:0;s:11:\"secure_pass\";i:0;s:5:\"agree\";i:1;s:12:\"registration\";i:1;s:15:\"active_template\";s:5:\"basic\";s:17:\"system_customized\";i:0;s:15:\"paginate_number\";i:20;s:15:\"currency_format\";s:1:\"1\";s:10:\"ref_system\";i:0;s:14:\"ref_commission\";d:0;s:11:\"instruction\";N;s:8:\"ins_file\";N;s:12:\"per_download\";N;s:13:\"auto_approval\";i:0;s:12:\"upload_limit\";i:0;s:3:\"ftp\";N;s:19:\"image_maximum_price\";N;s:17:\"is_invoice_active\";i:0;s:6:\"wasabi\";N;s:13:\"digital_ocean\";N;s:5:\"vultr\";N;s:16:\"donation_setting\";N;s:12:\"storage_type\";s:1:\"1\";s:9:\"watermark\";i:0;s:10:\"ads_script\";N;s:10:\"ads_module\";i:0;s:6:\"banner\";i:0;s:14:\"contact_system\";i:0;s:15:\"donation_module\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2024-11-02 22:22:38\";}s:11:\"\0*\0original\";a:58:{s:2:\"id\";i:1;s:9:\"site_name\";s:12:\"Sistem Pakar\";s:8:\"cur_text\";s:3:\"IDR\";s:7:\"cur_sym\";s:2:\"Rp\";s:10:\"email_from\";s:20:\"rizky@trxmod21x.tech\";s:15:\"email_from_name\";s:11:\"Teuku Rizky\";s:14:\"email_template\";s:5883:\"<html>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n<title>\r\n</title>\r\n<style type=\"text/css\">\r\n	.ReadMsgBody {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass,\r\n	.ExternalClass p,\r\n	.ExternalClass span,\r\n	.ExternalClass font,\r\n	.ExternalClass td,\r\n	.ExternalClass div {\r\n		line-height: 100%;\r\n	}\r\n	html {\r\n		width: 100%;\r\n	}\r\n	body {\r\n		-webkit-text-size-adjust: none;\r\n		-ms-text-size-adjust: none;\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n	table {\r\n		border-spacing: 0;\r\n		table-layout: fixed;\r\n		margin: 0 auto;\r\n		border-collapse: collapse;\r\n	}\r\n	table table table {\r\n		table-layout: auto;\r\n	}\r\n	.yshortcuts a {\r\n		border-bottom: none !important;\r\n	}\r\n	img:hover {\r\n		opacity: 0.9 !important;\r\n	}\r\n	a {\r\n		color: #0087ff;\r\n		text-decoration: none;\r\n	}\r\n	.textbutton a {\r\n		font-family: \"open sans\", arial, sans-serif !important;\r\n	}\r\n	.btn-link a {\r\n		color: #ffffff !important;\r\n	}\r\n	@media only screen and (max-width: 480px) {\r\n		body {\r\n			width: auto !important;\r\n		}\r\n		*[class=\"table-inner\"] {\r\n			width: 90% !important;\r\n			text-align: center !important;\r\n		}\r\n		*[class=\"table-full\"] {\r\n			width: 100% !important;\r\n			text-align: center !important;\r\n		} /* image */\r\n		img[class=\"img1\"] {\r\n			width: 100% !important;\r\n			height: auto !important;\r\n		}\r\n	}\r\n\r\n</style>\r\n<table bgcolor=\"#030442\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"50\">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n					<tbody>\r\n						<tr>\r\n							<td align=\"center\" width=\"600\">\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n												<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">\r\n															This is a System Generated Email</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"35\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n																<a href=\"#\">\r\n																	<img style=\"display:block; line-height:0px; font-size:0px; border:0px; width: 240px;\" width=\"240px\" src=\"http://localhost:8000/assets/images/logo_icon/logo_dark.png\" alt=\"img\">\r\n																</a>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"40\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open Sans, Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">\r\n															Hello {{fullname}} ({{username}}) </td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n																<table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"20\" style=\" border-bottom:3px solid #0087ff;\">\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"30\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"left\" style=\"font-family: Open sans, Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">\r\n															{{message}}</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"preference-link\" align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n																© 2023 <a href=\"#\">{{site_name}}</a> &nbsp;. All Rights Reserved. </td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"60\"></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</html>\";s:12:\"sms_template\";s:43:\"hi {{fullname}} ({{username}}), {{message}}\";s:8:\"sms_from\";s:9:\"TrxMod21X\";s:10:\"push_title\";s:9:\"TrxMod21X\";s:13:\"push_template\";s:43:\"hi {{fullname}} ({{username}}), {{message}}\";s:10:\"base_color\";s:6:\"560285\";s:11:\"mail_config\";s:131:\"{\"name\":\"smtp\",\"host\":\"sandbox.smtp.mailtrap.io\",\"port\":\"2525\",\"enc\":\"tls\",\"username\":\"8a8c50d9549326\",\"password\":\"6c4f7b06b3a52b\"}\";s:10:\"sms_config\";s:768:\"{\"name\":\"twilio\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"--------------\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"ACf2faffdb00b7ff63bc940a49a41fb3b1\",\"auth_token\":\"d70293a4d1393984ea8fd3a1e451ac23\",\"from\":\"+14159094723\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}\";s:15:\"firebase_config\";s:313:\"{\"apiKey\":\"AIzaSyB95O17nkkIGWI5kEYBvwyDlcBswSWSkh8\",\"authDomain\":\"laravel-starter-3d1c3.firebaseapp.com\",\"projectId\":\"laravel-starter-3d1c3\",\"storageBucket\":\"laravel-starter-3d1c3.appspot.com\",\"messagingSenderId\":\"1066845175582\",\"appId\":\"1:1066845175582:web:23b0184233472aaae4530f\",\"measurementId\":\"G-LH8NX265N8\"}\";s:17:\"global_shortcodes\";s:128:\"{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}\";s:21:\"socialite_credentials\";s:380:\"{\"google\":{\"client_id\":\"197067784702-eia2uhjbl3mcd6r1kkdrdsj785soq7el.apps.googleusercontent.com\",\"client_secret\":\"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\",\"status\":0},\"facebook\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0},\"linkedin\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0}}\";s:17:\"available_version\";N;s:7:\"kyc_ver\";i:0;s:9:\"email_ver\";i:0;s:11:\"email_notif\";i:1;s:7:\"sms_ver\";i:0;s:9:\"sms_notif\";i:1;s:10:\"push_notif\";i:0;s:10:\"multi_lang\";i:0;s:9:\"force_ssl\";i:0;s:14:\"in_app_payment\";i:0;s:16:\"maintenance_mode\";i:0;s:11:\"secure_pass\";i:0;s:5:\"agree\";i:1;s:12:\"registration\";i:1;s:15:\"active_template\";s:5:\"basic\";s:17:\"system_customized\";i:0;s:15:\"paginate_number\";i:20;s:15:\"currency_format\";s:1:\"1\";s:10:\"ref_system\";i:0;s:14:\"ref_commission\";d:0;s:11:\"instruction\";N;s:8:\"ins_file\";N;s:12:\"per_download\";N;s:13:\"auto_approval\";i:0;s:12:\"upload_limit\";i:0;s:3:\"ftp\";N;s:19:\"image_maximum_price\";N;s:17:\"is_invoice_active\";i:0;s:6:\"wasabi\";N;s:13:\"digital_ocean\";N;s:5:\"vultr\";N;s:16:\"donation_setting\";N;s:12:\"storage_type\";s:1:\"1\";s:9:\"watermark\";i:0;s:10:\"ads_script\";N;s:10:\"ads_module\";i:0;s:6:\"banner\";i:0;s:14:\"contact_system\";i:0;s:15:\"donation_module\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2024-11-02 22:22:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:11:{s:11:\"mail_config\";s:6:\"object\";s:10:\"sms_config\";s:6:\"object\";s:17:\"global_shortcodes\";s:6:\"object\";s:21:\"socialite_credentials\";s:6:\"object\";s:15:\"firebase_config\";s:6:\"object\";s:11:\"instruction\";s:6:\"object\";s:3:\"ftp\";s:6:\"object\";s:6:\"wasabi\";s:6:\"object\";s:13:\"digital_ocean\";s:6:\"object\";s:5:\"vultr\";s:6:\"object\";s:16:\"donation_setting\";s:6:\"object\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:3:{i:0;s:14:\"email_template\";i:1;s:11:\"mail_config\";i:2;s:10:\"sms_config\";}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:3:{i:0;s:2:\"id\";i:1;s:10:\"created_at\";i:2;s:10:\"updated_at\";}}', 2045920958),
('userone|127.0.0.1', 'i:1;', 1730987689),
('userone|127.0.0.1:timer', 'i:1730987689;', 1730987689);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` varchar(40) DEFAULT NULL,
  `results` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_symptoms`
--

CREATE TABLE `diagnosis_symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnose_id` bigint(20) UNSIGNED NOT NULL,
  `symptom_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL COMMENT 'short description',
  `details` text DEFAULT NULL COMMENT 'long description',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `slug`, `description`, `details`, `status`, `created_at`, `updated_at`) VALUES
(18, 'Osteoarthritis Genu (OA Lutut)', 'osteoarthritis-genu-oa-lutut', 'Osteoarthritis pada lutut (OA Genu) adalah bentuk osteoarthritis yang paling umum.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Osteoarthritis pada lutut (OA Genu) adalah bentuk osteoarthritis yang paling umum. Pada OA genu, kerusakan pada tulang rawan sendi lutut dapat menyebabkan rasa nyeri, kekakuan, dan pembengkakan. Kondisi ini sering berhubungan dengan faktor usia, obesitas, atau cedera lutut sebelumnya. OA Genu dapat secara signifikan mempengaruhi mobilitas dan kualitas hidup penderita.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:11:15', '2024-12-30 16:26:00'),
(19, 'Osteoarthritis Shoulder (OA Bahu)', 'osteoarthritis-shoulder-oa-bahu', 'Osteoarthritis bahu (OA shoulder) adalah kondisi degeneratif yang mempengaruhi sendi glenohumeral (sendi bahu).', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Osteoarthritis bahu (OA shoulder) adalah kondisi degeneratif yang mempengaruhi sendi glenohumeral (sendi bahu), yang sering kali menyebabkan rasa nyeri, keterbatasan gerak, dan penurunan fungsi bahu. OA shoulder lebih sering terjadi pada individu yang telah berusia lanjut dan mereka yang memiliki riwayat cedera pada bahu.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:11:52', '2024-12-30 16:26:23'),
(20, 'Golf Elbow', 'golf-elbow', 'Golf elbow, adalah kondisi yang ditandai dengan peradangan pada tendon di sisi dalam siku', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Golf elbow, adalah kondisi yang ditandai dengan peradangan pada tendon di sisi dalam siku, biasanya disebabkan oleh penggunaan berulang atau tekanan berlebihan pada otot dan tendon yang menghubungkan lengan bawah dengan bagian dalam siku. Meskipun dinamai \"golf elbow,\" kondisi ini tidak hanya terjadi pada pemain golf, tetapi juga dapat dialami oleh siapa saja yang melakukan gerakan berulang yang melibatkan pergelangan tangan dan lengan. Gejala yang umum meliputi nyeri di sisi dalam siku yang dapat menyebar ke lengan bawah, kelemahan pada pergelangan tangan dan jari, nyeri saat menggenggam atau memutar pergelangan tangan, rasa kaku di siku, serta nyeri yang memburuk saat melakukan aktivitas yang melibatkan lengan dan pergelangan tangan.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:12:27', '2024-12-30 16:12:27'),
(21, 'Osteoporosis', 'osteoporosis', 'Osteoporosis adalah kondisi medis yang dicirikan oleh penurunan kepadatan tulang, yang dapat meningkatkan risiko patah tulang.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Osteoporosis adalah kondisi medis yang dicirikan oleh penurunan kepadatan tulang, yang dapat meningkatkan risiko patah tulang. Pencegahan dini terhadap penyakit ini dapat mencegah konsekuensi serius, seperti penuaan yang terlihat pada wajah yang keriput dan perubahan warna rambut yang tidak sesuai usia</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:12:56', '2024-12-30 16:12:56'),
(22, 'Frozen Shoulder', 'frozen-shoulder', 'Frozen shoulder, adalah kondisi yang ditandai dengan nyeri dan keterbatasan gerakan pada sendi bahu.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Frozen shoulder, adalah kondisi yang ditandai dengan nyeri dan keterbatasan gerakan pada sendi bahu. Penyebabnya sering kali tidak diketahui, tetapi dapat terkait dengan cedera, operasi, atau kondisi medis lainnya. Gejala yang umum meliputi nyeri pada bahu, kekakuan, dan kesulitan dalam menggerakkan lengan. Kondisi ini dapat berlangsung selama beberapa bulan hingga beberapa tahun, dan pengobatan biasanya melibatkan fisioterapi, obat antiinflamasi, dan dalam beberapa kasus, prosedur bedah</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:13:30', '2024-12-30 16:13:30'),
(23, 'Tenis Elbow', 'tenis-elbow', 'Tenis elbow, atau lateral epicondylitis, adalah peradangan pada tendon di sisi luar siku akibat penggunaan berulang.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Tenis elbow, atau lateral epicondylitis, adalah peradangan pada tendon di sisi luar siku akibat penggunaan berulang, yang sering terjadi pada individu yang melakukan aktivitas yang melibatkan gerakan pergelangan tangan dan lengan. Gejala yang umum meliputi nyeri di sisi luar siku, kelemahan saat menggenggam, dan nyeri yang memburuk saat melakukan aktivitas tertentu. Meskipun dinamai \"tenis elbow,\" kondisi ini dapat terjadi pada siapa saja, tidak hanya pemain tenis.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:14:21', '2024-12-30 16:14:21'),
(24, 'Low Back Pain (HNP Lumbal)', 'low-back-pain-hnp-lumbal', 'Hernia Nucleus Pulposus (HNP) atau Low Back Pain (LBP) adalah kondisi di mana diskus tulang belakang keluar dari posisinya dan menekan saraf.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Hernia Nucleus Pulposus (HNP) atau Low Back Pain (LBP) adalah kondisi di mana diskus tulang belakang keluar dari posisinya dan menekan saraf, menyebabkan nyeri punggung bawah yang terkadang menyebar ke kaki. Gejala yang umum meliputi nyeri punggung yang tajam, kesemutan, atau kelemahan di kaki, serta keterbatasan dalam bergerak. Pengobatan untuk HNP Lumbal dapat mencakup fisioterapi, obat penghilang rasa sakit, dan dalam beberapa kasus, pembedahan.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:15:37', '2024-12-30 16:15:37'),
(25, 'Osteomyelitis', 'osteomyelitis', 'Osteomielitis merujuk pada peradangan dalam sumsum tulang.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Osteomielitis merujuk pada peradangan dalam sumsum tulang. Pada kebanyakan kasus, infeksi telah menyebar dan melibatkan baik tulang kortikal maupun periosteum. Meskipun angka kejadian penyakit ini tidak sebanyak masa lalu berkat penggunaan antibiotik yang luas, osteomielitis tetap merupakan masalah serius, terutama dalam hal estetika karena dapat mengganggu fungsi secara keseluruhan. Osteomielitis rahang dapat dibagi menjadi dua kategori, yaitu supuratif dan non-supuratif, tergantung pada gejala klinis. Selain itu, ada bentuk osteomielitis yang lebih jarang, seperti yang terkait dengan sifilis, virus, dan tuberkulosis</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:16:05', '2024-12-30 16:16:05'),
(26, 'Carpal Tunnel Syndrome (CTS)', 'carpal-tunnel-syndrome-cts', 'Carpal Tunnel Syndrome (CTS) adalah kondisi yang terjadi akibat tekanan berlebihan pada saraf median di pergelangan tangan.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Carpal Tunnel Syndrome (CTS) adalah kondisi yang terjadi akibat tekanan berlebihan pada saraf median di pergelangan tangan, yang dapat menyebabkan gejala seperti kebas, nyeri, dan kesemutan di tangan dan jari. Gejala ini sering kali memburuk saat malam hari dan dapat mempengaruhi kemampuan seseorang untuk menggenggam atau melakukan aktivitas yang melibatkan tangan. Penyebab CTS dapat mencakup penggunaan berulang, cedera, atau kondisi medis seperti diabetes dan rheumatoid arthritis. Pengobatan dapat meliputi perubahan aktivitas, penggunaan splint, terapi fisik, dan dalam beberapa kasus, pembedahan.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:16:51', '2024-12-30 16:16:51'),
(27, 'Trigger Finger', 'trigger-finger', 'Trigger Finger adalah gangguan di mana jari terkunci atau terhalang saat digerakkan.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Trigger Finger adalah gangguan di mana jari terkunci atau terhalang saat digerakkan, biasanya akibat peradangan pada tendon yang menggerakkan jari. Gejala yang umum meliputi nyeri pada jari, keterbatasan gerak, dan bunyi \"klik\" saat jari diluruskan atau ditekuk. Kondisi ini sering kali terjadi pada individu yang melakukan gerakan berulang dengan tangan. Pengobatan dapat mencakup istirahat, penggunaan splint, terapi fisik, dan dalam beberapa kasus, injeksi steroid atau pembedahan.</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:17:20', '2024-12-30 16:17:20'),
(28, 'Skoliosis Thorakul Lumbal', 'skoliosis-thorakul-lumbal', 'Skoliosis adalah kelainan pada tulang belakang yang ditandai dengan kelengkungan abnormal.', '<p class=\"MsoNormal\" align=\"justify\" style=\"margin-bottom: 0pt; line-height: 15.6933px; font-family: Calibri; font-size: 11pt; color: rgb(0, 0, 0); text-indent: 0pt; text-align: justify;\"><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\">Skoliosis adalah kelainan pada tulang belakang yang ditandai dengan kelengkungan abnormal, yang dapat mengganggu postur tubuh dan fungsi pernapasan. Skoliosis thorakul lumbal terjadi pada area tulang belakang bagian torakal (dada) dan lumbal (pinggang). Gejala yang umum meliputi nyeri punggung, ketidaksimetrisan tubuh, dan dalam kasus yang parah, kesulitan bernapas. Penyebab skoliosis dapat bervariasi, termasuk faktor genetik dan kondisi medis tertentu. Pengobatan dapat mencakup pemantauan, fisioterapi, penggunaan brace, atau pembedahan tergantung pada tingkat keparahan kelengkungan</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 12pt;\"><o:p></o:p></span></p>', 1, '2024-12-30 16:17:53', '2024-12-30 16:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptoms`
--

CREATE TABLE `disease_symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `symptom_id` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(8,1) NOT NULL DEFAULT 0.0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `script` text DEFAULT NULL,
  `shortcode` text DEFAULT NULL,
  `support` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `created_at`, `updated_at`) VALUES
(9, 'tawk-chat', 'Tawk.to', 'TrxMod21X', 'tawky_big.png', '<script type=\"text/javascript\">\n                                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                                (function(){\n                                var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                                s1.async=true;\n                                s1.src=\"https://embed.tawk.to/{{app_key}}\";\n                                s1.charset=\"UTF-8\";\n                                s1.setAttribute(\"crossorigin\",\"*\");\n                                s0.parentNode.insertBefore(s1,s0);\n                                })();\n                             </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"6708e5614304e3196ad00b85\\\\\\/1i9tc01hs\"}}', 'twak.png', 1, NULL, '2024-11-10 11:15:07'),
(10, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\n                <script src=\"https://www.google.com/recaptcha/api.js\"></script>\n                <div class=\"g-recaptcha\" data-sitekey=\"{{site_key}}\" data-callback=\"verifyCaptcha\"></div>\n                <div id=\"g-recaptcha-error\"></div>', '{\"site_key\":{\"title\":\"Site Key\",\"value\":\"6LeaSDcqAAAAADZNSPfzA8IP_GIG06rZDbMG5OCh\"},\"secret_key\":{\"title\":\"Secret Key\",\"value\":\"6LeaSDcqAAAAAL7xn1qd9eJ2MuqM7uxbvq1HmdLe\"}}', 'recaptcha.png', 0, NULL, '2024-11-15 16:03:11'),
(11, 'custom-captcha', 'Custom Captcha', 'Just put any random string', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"TrxMod21X\"}}', 'na', 0, NULL, '2024-11-02 16:56:46'),
(12, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google_analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{measurement_id}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{measurement_id}}\");\n                </script>', '{\"measurement_id\":{\"title\":\"Measurement ID\",\"value\":\"------\"}}', 'ganalytics.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_keys` varchar(255) DEFAULT NULL,
  `data_values` longtext DEFAULT NULL,
  `seo_content` longtext DEFAULT NULL,
  `tempname` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `seo_content`, `tempname`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"laravel\",\"php\",\"admin\",\"dashboard\",\"starter-code\",\"trxmod21x\"],\"description\":\"test\",\"social_title\":\"test\",\"social_description\":\"test\",\"image\":\"66e6b4e5634351726395621.png\"}', NULL, 'basic', '', '2024-09-15 09:27:44', '2024-09-15 10:20:21'),
(2, 'policy_pages.element', '{\"title\":\"Privacy Policy\",\"details\":\"Privacy Policy Content\"}', NULL, 'basic', 'privacy-policy', '2024-11-02 09:31:10', '2024-11-02 09:31:10'),
(3, 'policy_pages.element', '{\"title\":\"Terms of Service\",\"details\":\"<span style=\\\"font-size:13px;text-align:center;\\\">Terms of Service Content<\\/span><br \\/>\"}', NULL, 'basic', 'terms-of-service', '2024-11-02 09:31:40', '2024-11-02 09:31:40'),
(4, 'policy_pages.element', '{\"title\":\"Conditions\",\"details\":\"<span style=\\\"font-size:13px;text-align:center;\\\">Conditions Content<\\/span><br \\/>\"}', NULL, 'basic', 'conditions', '2024-11-02 09:31:59', '2024-11-02 09:31:59'),
(5, 'login.content', '{\"has_image\":\"1\",\"form_title\":\"Login\",\"background_image\":\"672631816172d1730556289.jpg\",\"image\":\"67263181a38241730556289.jpg\"}', NULL, 'basic', '', '2024-11-02 09:33:18', '2024-11-02 14:04:49'),
(6, 'register.content', '{\"has_image\":\"1\",\"form_title\":\"Register Now\"}', NULL, 'basic', '', '2024-11-02 09:33:37', '2024-11-02 09:33:37'),
(7, 'register_disable.content', '{\"has_image\":\"1\",\"heading\":\"Registration disabled\",\"subheading\":\"disabled\",\"button_url\":\"http:\\/\\/localhost:8000\\/\",\"button_name\":\"Back to home\"}', NULL, 'basic', '', '2024-11-02 10:33:46', '2024-11-02 10:33:46'),
(8, 'diagnostic_page.content', '{\"help_content\":\"<div style=\\\"text-align:left;\\\"><font size=\\\"6\\\">HELP CONTENT<\\/font><\\/div><div style=\\\"text-align:center;\\\"><font size=\\\"6\\\"><br \\/><\\/font><\\/div><div style=\\\"text-align:center;\\\"><font size=\\\"6\\\">sadasdas<\\/font><\\/div>\",\"brief_instruction_content\":\"Brief instruction content\",\"possible_results_content\":\"Possible results content\",\"selected_symptoms_content\":\"Selected Symptoms contents\",\"recomendation_content\":\"Recomendation content contente\"}', NULL, 'basic', '', '2024-11-06 17:16:16', '2024-11-07 14:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `cur_text` varchar(255) DEFAULT NULL,
  `cur_sym` varchar(255) DEFAULT NULL,
  `email_from` varchar(255) DEFAULT NULL,
  `email_from_name` varchar(255) DEFAULT NULL,
  `email_template` text DEFAULT NULL,
  `sms_template` text DEFAULT NULL,
  `sms_from` varchar(255) DEFAULT NULL,
  `push_title` varchar(255) DEFAULT NULL,
  `push_template` text DEFAULT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `mail_config` text DEFAULT NULL,
  `sms_config` text DEFAULT NULL,
  `firebase_config` text DEFAULT NULL,
  `global_shortcodes` text DEFAULT NULL,
  `socialite_credentials` text DEFAULT NULL,
  `available_version` varchar(255) DEFAULT NULL,
  `kyc_ver` tinyint(1) NOT NULL DEFAULT 0,
  `email_ver` tinyint(1) NOT NULL DEFAULT 0,
  `email_notif` tinyint(1) NOT NULL DEFAULT 0,
  `sms_ver` tinyint(1) NOT NULL DEFAULT 0,
  `sms_notif` tinyint(1) NOT NULL DEFAULT 0,
  `push_notif` tinyint(1) NOT NULL DEFAULT 0,
  `multi_lang` tinyint(1) NOT NULL DEFAULT 0,
  `force_ssl` tinyint(1) NOT NULL DEFAULT 0,
  `in_app_payment` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `secure_pass` tinyint(1) NOT NULL DEFAULT 0,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `registration` tinyint(1) NOT NULL DEFAULT 0,
  `active_template` varchar(255) DEFAULT NULL,
  `system_customized` tinyint(1) NOT NULL DEFAULT 0,
  `paginate_number` int(11) NOT NULL DEFAULT 0,
  `currency_format` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1 = Both, 2 = Text Only, 3 = Symbol Only',
  `ref_system` tinyint(1) NOT NULL DEFAULT 0,
  `ref_commission` double NOT NULL DEFAULT 0,
  `instruction` text DEFAULT NULL,
  `ins_file` varchar(255) DEFAULT NULL,
  `per_download` decimal(8,2) DEFAULT NULL,
  `auto_approval` tinyint(1) NOT NULL DEFAULT 0,
  `upload_limit` int(11) NOT NULL DEFAULT 0,
  `ftp` text DEFAULT NULL,
  `image_maximum_price` decimal(8,2) DEFAULT NULL,
  `is_invoice_active` tinyint(1) NOT NULL DEFAULT 0,
  `wasabi` text DEFAULT NULL,
  `digital_ocean` text DEFAULT NULL,
  `vultr` text DEFAULT NULL,
  `donation_setting` text DEFAULT NULL,
  `storage_type` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '1 = Local Storage, 2 = FTP, 3 = Wasaby, 4 = Digital Ocean',
  `watermark` tinyint(1) NOT NULL DEFAULT 1,
  `ads_script` text DEFAULT NULL,
  `ads_module` tinyint(1) NOT NULL DEFAULT 0,
  `banner` tinyint(1) NOT NULL DEFAULT 0,
  `contact_system` tinyint(1) NOT NULL DEFAULT 0,
  `donation_module` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `cur_text`, `cur_sym`, `email_from`, `email_from_name`, `email_template`, `sms_template`, `sms_from`, `push_title`, `push_template`, `base_color`, `mail_config`, `sms_config`, `firebase_config`, `global_shortcodes`, `socialite_credentials`, `available_version`, `kyc_ver`, `email_ver`, `email_notif`, `sms_ver`, `sms_notif`, `push_notif`, `multi_lang`, `force_ssl`, `in_app_payment`, `maintenance_mode`, `secure_pass`, `agree`, `registration`, `active_template`, `system_customized`, `paginate_number`, `currency_format`, `ref_system`, `ref_commission`, `instruction`, `ins_file`, `per_download`, `auto_approval`, `upload_limit`, `ftp`, `image_maximum_price`, `is_invoice_active`, `wasabi`, `digital_ocean`, `vultr`, `donation_setting`, `storage_type`, `watermark`, `ads_script`, `ads_module`, `banner`, `contact_system`, `donation_module`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Pakar', 'IDR', 'Rp', 'rizky@trxmod21x.tech', 'Teuku Rizky', '<html>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n<title>\r\n</title>\r\n<style type=\"text/css\">\r\n	.ReadMsgBody {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass {\r\n		width: 100%;\r\n		background-color: #ffffff;\r\n	}\r\n	.ExternalClass,\r\n	.ExternalClass p,\r\n	.ExternalClass span,\r\n	.ExternalClass font,\r\n	.ExternalClass td,\r\n	.ExternalClass div {\r\n		line-height: 100%;\r\n	}\r\n	html {\r\n		width: 100%;\r\n	}\r\n	body {\r\n		-webkit-text-size-adjust: none;\r\n		-ms-text-size-adjust: none;\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n	table {\r\n		border-spacing: 0;\r\n		table-layout: fixed;\r\n		margin: 0 auto;\r\n		border-collapse: collapse;\r\n	}\r\n	table table table {\r\n		table-layout: auto;\r\n	}\r\n	.yshortcuts a {\r\n		border-bottom: none !important;\r\n	}\r\n	img:hover {\r\n		opacity: 0.9 !important;\r\n	}\r\n	a {\r\n		color: #0087ff;\r\n		text-decoration: none;\r\n	}\r\n	.textbutton a {\r\n		font-family: \"open sans\", arial, sans-serif !important;\r\n	}\r\n	.btn-link a {\r\n		color: #ffffff !important;\r\n	}\r\n	@media only screen and (max-width: 480px) {\r\n		body {\r\n			width: auto !important;\r\n		}\r\n		*[class=\"table-inner\"] {\r\n			width: 90% !important;\r\n			text-align: center !important;\r\n		}\r\n		*[class=\"table-full\"] {\r\n			width: 100% !important;\r\n			text-align: center !important;\r\n		} /* image */\r\n		img[class=\"img1\"] {\r\n			width: 100% !important;\r\n			height: auto !important;\r\n		}\r\n	}\r\n\r\n</style>\r\n<table bgcolor=\"#030442\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"50\">\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n					<tbody>\r\n						<tr>\r\n							<td align=\"center\" width=\"600\">\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#0087ff\" style=\"border-top-left-radius:6px; border-top-right-radius:6px;text-align:center;vertical-align:top;font-size:0;\" align=\"center\">\r\n												<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#FFFFFF; font-size:16px; font-weight: bold;\">\r\n															This is a System Generated Email</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\">\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<table class=\"table-inner\" width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"#FFFFFF\" align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"35\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"vertical-align:top;font-size:0;\">\r\n																<a href=\"#\">\r\n																	<img style=\"display:block; line-height:0px; font-size:0px; border:0px; width: 240px;\" width=\"240px\" src=\"http://localhost:8000/assets/images/logo_icon/logo_dark.png\" alt=\"img\">\r\n																</a>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"40\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Open Sans, Arial, sans-serif; font-size: 22px;color:#414a51;font-weight: bold;\">\r\n															Hello {{fullname}} ({{username}}) </td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"center\" style=\"text-align:center;vertical-align:top;font-size:0;\">\r\n																<table width=\"40\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"20\" style=\" border-bottom:3px solid #0087ff;\">\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"30\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td align=\"left\" style=\"font-family: Open sans, Arial, sans-serif; color:#7f8c8d; font-size:16px; line-height: 28px;\">\r\n															{{message}}</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"45\" align=\"center\" bgcolor=\"#f4f4f4\" style=\"border-bottom-left-radius:6px;border-bottom-right-radius:6px;\">\r\n												<table align=\"center\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"preference-link\" align=\"center\" style=\"font-family: Open sans, Arial, sans-serif; color:#95a5a6; font-size:14px;\">\r\n																© 2023 <a href=\"#\">{{site_name}}</a> &nbsp;. All Rights Reserved. </td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"60\"></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</html>', 'hi {{fullname}} ({{username}}), {{message}}', 'TrxMod21X', 'TrxMod21X', 'hi {{fullname}} ({{username}}), {{message}}', '560285', '{\"name\":\"smtp\",\"host\":\"sandbox.smtp.mailtrap.io\",\"port\":\"2525\",\"enc\":\"tls\",\"username\":\"8a8c50d9549326\",\"password\":\"6c4f7b06b3a52b\"}', '{\"name\":\"twilio\",\"clickatell\":{\"api_key\":\"----------------\"},\"infobip\":{\"username\":\"--------------\",\"password\":\"-----------------\"},\"message_bird\":{\"api_key\":\"-------------------\"},\"nexmo\":{\"api_key\":\"----------------------\",\"api_secret\":\"----------------------\"},\"sms_broadcast\":{\"username\":\"----------------------\",\"password\":\"-----------------------------\"},\"twilio\":{\"account_sid\":\"ACf2faffdb00b7ff63bc940a49a41fb3b1\",\"auth_token\":\"d70293a4d1393984ea8fd3a1e451ac23\",\"from\":\"+14159094723\"},\"text_magic\":{\"username\":\"-----------------------\",\"apiv2_key\":\"-------------------------------\"},\"custom\":{\"method\":\"get\",\"url\":\"https:\\/\\/hostname\\/demo-api-v1\",\"headers\":{\"name\":[\"api_key\"],\"value\":[\"test_api 555\"]},\"body\":{\"name\":[\"from_number\"],\"value\":[\"5657545757\"]}}}', '{\"apiKey\":\"AIzaSyB95O17nkkIGWI5kEYBvwyDlcBswSWSkh8\",\"authDomain\":\"laravel-starter-3d1c3.firebaseapp.com\",\"projectId\":\"laravel-starter-3d1c3\",\"storageBucket\":\"laravel-starter-3d1c3.appspot.com\",\"messagingSenderId\":\"1066845175582\",\"appId\":\"1:1066845175582:web:23b0184233472aaae4530f\",\"measurementId\":\"G-LH8NX265N8\"}', '{\n    \"site_name\":\"Name of your site\",\n    \"site_currency\":\"Currency of your site\",\n    \"currency_symbol\":\"Symbol of currency\"\n}', '{\"google\":{\"client_id\":\"197067784702-eia2uhjbl3mcd6r1kkdrdsj785soq7el.apps.googleusercontent.com\",\"client_secret\":\"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\",\"status\":0},\"facebook\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0},\"linkedin\":{\"client_id\":\"-------------------------\",\"client_secret\":\"-------------------------\",\"status\":0}}', NULL, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 'basic', 0, 20, '1', 0, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, '1', 0, NULL, 0, 0, 0, 0, NULL, '2024-11-02 15:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `slug`, `images`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'RSUD Dr. Zainoel Abidin', 'rsud-dr-zainoel-abidin', NULL, 5.56479284, 95.33789383, '2024-11-17 15:46:39', '2024-11-17 15:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => not default language, 1 => default language',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `image`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, '67264bc28a5fd1730563010.jpg', '2024-11-02 15:56:50', '2024-11-02 16:33:03'),
(2, 'Indonesia', 'id', 0, '67264d9c335b11730563484.jpg', '2024-11-02 16:04:44', '2024-11-02 16:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_09_165808_create_admins_table', 2),
(5, '2024_09_09_165928_create_admin_password_resets', 2),
(6, '2024_09_09_172339_create_general_settings_table', 3),
(7, '2024_09_10_163125_create_frontends_table', 4),
(8, '2024_09_10_171734_create_extensions_table', 5),
(9, '2024_09_12_154150_create_notification_templates_table', 6),
(10, '2024_09_12_164029_create_admin_notifications_table', 7),
(11, '2024_09_12_164713_create_notification_logs_table', 7),
(12, '2024_10_31_154111_create_diseases_table', 8),
(13, '2024_10_31_165749_create_symptoms_table', 9),
(14, '2024_11_02_164200_create_users_table', 10),
(15, '2024_11_02_165752_create_user_logins_table', 11),
(16, '2024_11_02_224024_create_languages_table', 12),
(17, '2024_11_03_152457_create_password_resets_table', 13),
(18, '2024_11_04_165716_create_disease_symptom_rules_table', 14),
(19, '2024_11_04_173905_create_disease_symptoms_table', 15),
(20, '2024_11_05_154844_create_disease_symptoms_table', 16),
(21, '2024_11_05_155100_create_diagnoses_table', 16),
(22, '2024_11_05_155247_create_diagnosis_symptoms_table', 16),
(23, '2024_11_14_225344_create_recommendations_table', 17),
(24, '2024_11_17_222846_create_hostitals_table', 18),
(25, '2024_11_17_224052_create_hospitals_table', 19),
(26, '2024_12_30_163952_add_rm_to_users_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notification_logs`
--

CREATE TABLE `notification_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sender` varchar(255) DEFAULT NULL,
  `sent_from` varchar(255) DEFAULT NULL,
  `sent_to` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `notification_type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `act` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `push_title` varchar(255) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `sms_body` text DEFAULT NULL,
  `push_body` text DEFAULT NULL,
  `shortcodes` text DEFAULT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 1,
  `email_sent_from_name` varchar(255) DEFAULT NULL,
  `email_sent_from_address` varchar(255) DEFAULT NULL,
  `sms_status` tinyint(1) NOT NULL DEFAULT 1,
  `sms_sent_from` varchar(255) DEFAULT NULL,
  `push_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `act`, `name`, `subject`, `push_title`, `email_body`, `sms_body`, `push_body`, `shortcodes`, `email_status`, `email_sent_from_name`, `email_sent_from_address`, `sms_status`, `sms_sent_from`, `push_status`, `created_at`, `updated_at`) VALUES
(1, 'DEFAULT', 'Default Template', '{{subject}}', '{{subject}}', '{{message}}', '{{message}}', '{{message}}', '{\"subject\":\"Subject\",\"message\":\"Message\"}', 1, NULL, NULL, 1, NULL, 1, NULL, '2024-09-14 10:22:18'),
(2, 'PASS_RESET_CODE', 'Password - Reset - Code', 'Password Reset', '{{site_name}} Password Reset Code', '<div style=\"font-family: Montserrat, sans-serif;\">We have received a request to reset the password for your account on&nbsp;<span style=\"font-weight: bolder;\">{{time}} .<br></span></div><div style=\"font-family: Montserrat, sans-serif;\">Requested From IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>.</div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><br style=\"font-family: Montserrat, sans-serif;\"><div style=\"font-family: Montserrat, sans-serif;\"><div>Your account recovery code is:&nbsp;&nbsp;&nbsp;<font size=\"6\"><span style=\"font-weight: bolder;\">{{code}}</span></font></div><div><br></div></div><div style=\"font-family: Montserrat, sans-serif;\"><br></div><div style=\"font-family: Montserrat, sans-serif;\"><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><div><font size=\"4\" color=\"#CC0000\"><br></font></div>', 'Your account recovery code is: {{code}}', NULL, '{\"code\":\"Verification code for password reset\",\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, NULL, NULL, 0, NULL, 0, NULL, NULL),
(3, 'PASS_RESET_DONE', 'Password - Reset - Confirmation', 'You have reset your password', NULL, '<p style=\"font-family: Montserrat, sans-serif;\">You have successfully reset your password.</p><p style=\"font-family: Montserrat, sans-serif;\">You changed from&nbsp; IP:&nbsp;<span style=\"font-weight: bolder;\">{{ip}}</span>&nbsp;using&nbsp;<span style=\"font-weight: bolder;\">{{browser}}</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{operating_system}}&nbsp;</span>&nbsp;on&nbsp;<span style=\"font-weight: bolder;\">{{time}}</span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><br></span></p><p style=\"font-family: Montserrat, sans-serif;\"><span style=\"font-weight: bolder;\"><font color=\"#ff0000\">If you did not change that, please contact us as soon as possible.</font></span></p>', 'Your password has been changed successfully', NULL, '{\"ip\":\"IP address of the user\",\"browser\":\"Browser of the user\",\"operating_system\":\"Operating system of the user\",\"time\":\"Time of the request\"}', 1, NULL, NULL, 1, NULL, 0, NULL, '2024-09-15 08:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(18, 'usertwo21@gmail.com', '994722', '2024-11-03 10:20:43', NULL),
(20, 'userone21@gmail.com', '615228', '2024-11-03 10:31:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT 1 COMMENT '1 => high, 2 => medium, 3 => low',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5jTl3zIxLOHpksxomqOwU8FTPHMPxIA9WEGXMCFt', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFhyMGJPRzFVOVFzZ0piRWhSVDNLamlKSnd5NlZqNjNPTzMySWM5cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735573403),
('Yg2FZeH2RBUpJ1vLkPOWgQdftrXE1akKvyi7izCO', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic0JURGRyOUdwRVBFNFhjcGNwY0piclFTa1VibnFTVElDd2dMQ2lEUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9zeW1wdG9tL2FsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTM6ImludGVuZGVkX2luZm8iO2E6NDp7czoxMDoicm91dGVfbmFtZSI7czo0OiJob21lIjtzOjE0OiJyb3V0ZV9mdWxsX3VybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjtzOjEyOiJxdWVyeV9wYXJhbXMiO2E6MDp7fXM6OToiZm9ybV9kYXRhIjthOjE6e3M6ODoidXNlcm5hbWUiO047fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1735579190);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL COMMENT 'short description',
  `details` text DEFAULT NULL COMMENT 'long details description',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`, `slug`, `description`, `details`, `status`, `created_at`, `updated_at`) VALUES
(52, 'Nyeri lutut kanan/kiri', 'nyeri-lutut-kanankiri', 'Nyeri lutut kanan/kiri', '<br>', 1, '2024-12-30 16:48:43', '2024-12-30 16:48:43'),
(53, 'Nyeri paha', 'nyeri-paha', 'Nyeri paha', '<br>', 1, '2024-12-30 16:48:51', '2024-12-30 16:48:51'),
(54, 'Kaku pada lutut kanan/kiri', 'kaku-pada-lutut-kanankiri', 'Kaku pada lutut kanan/kiri', '<br>', 1, '2024-12-30 16:49:02', '2024-12-30 16:49:02'),
(55, 'Lutut keram', 'lutut-keram', 'Lutut keram', '<br>', 1, '2024-12-30 16:54:41', '2024-12-30 16:54:41'),
(56, 'Limitasi ROW', 'limitasi-row', NULL, '<br>', 1, '2024-12-30 16:54:49', '2024-12-30 16:54:49'),
(57, 'Kelenturan sendi mulai menurun', 'kelenturan-sendi-mulai-menurun', 'Kelenturan sendi mulai menurun', '<br>', 1, '2024-12-30 16:57:14', '2024-12-30 16:57:14'),
(58, 'Bunyi kretek2 pada lutut', 'bunyi-kretek2-pada-lutut', 'Bunyi kretek2 pada lutut', '<br>', 1, '2024-12-30 16:57:21', '2024-12-30 16:57:21'),
(59, 'Jalan tidak seimbang (jika sudah parah)', 'jalan-tidak-seimbang-jika-sudah-parah', 'Jalan tidak seimbang (jika sudah parah)', '<br>', 1, '2024-12-30 16:57:37', '2024-12-30 16:57:37'),
(60, 'Nyeri tulang bahu', 'nyeri-tulang-bahu', 'Nyeri tulang bahu', '<br>', 1, '2024-12-30 16:57:50', '2024-12-30 16:57:50'),
(61, 'Nyeri leher', 'nyeri-leher', 'Nyeri leher', '<br>', 1, '2024-12-30 16:58:00', '2024-12-30 16:58:00'),
(62, 'Nyeri pundak', 'nyeri-pundak', 'Nyeri pundak', '<br>', 1, '2024-12-30 16:58:08', '2024-12-30 16:58:08'),
(63, 'Nyeri tulang belikat kanan/kiri', 'nyeri-tulang-belikat-kanankiri', 'Nyeri tulang belikat kanan/kiri', '<br>', 1, '2024-12-30 16:58:19', '2024-12-30 16:58:19'),
(64, 'Kaku leher', 'kaku-leher', 'Kaku leher', '<br>', 1, '2024-12-30 16:58:29', '2024-12-30 16:58:29'),
(65, 'terdengar suara gesekan saat menggerakkan bahu', 'terdengar-suara-gesekan-saat-menggerakkan-bahu', 'terdengar suara gesekan saat menggerakkan bahu', '<br>', 1, '2024-12-30 16:58:39', '2024-12-30 16:58:39'),
(66, 'kaku otot dibagian pinggang', 'kaku-otot-dibagian-pinggang', 'kaku otot dibagian pinggang', '<br>', 1, '2024-12-30 16:58:50', '2024-12-30 16:58:50'),
(67, 'Tegang otot pinggang', 'tegang-otot-pinggang', 'Tegang otot pinggang', '<br>', 1, '2024-12-30 16:59:01', '2024-12-30 16:59:01'),
(68, 'Penurunan tinggi badan secara bertahap', 'penurunan-tinggi-badan-secara-bertahap', 'Penurunan tinggi badan secara bertahap', '<br>', 1, '2024-12-30 16:59:12', '2024-12-30 16:59:12'),
(69, 'Postur membungkuk', 'postur-membungkuk', 'Postur membungkuk', '<br>', 1, '2024-12-30 16:59:26', '2024-12-30 16:59:26'),
(70, 'Rasa nyeri pinggang', 'rasa-nyeri-pinggang', 'Rasa nyeri pinggang', '<br>', 1, '2024-12-30 16:59:36', '2024-12-30 16:59:36'),
(71, 'Kesemutan sendi', 'kesemutan-sendi', 'Kesemutan sendi', '<br>', 1, '2024-12-30 16:59:44', '2024-12-30 16:59:44'),
(72, 'Terasa panas diarea tulang yang sakit menandakan sudah infeksi berat', 'terasa-panas-diarea-tulang-yang-sakit-menandakan-sudah-infeksi-berat', 'Terasa panas diarea tulang yang sakit menandakan sudah infeksi berat', '<br>', 1, '2024-12-30 16:59:56', '2024-12-30 16:59:56'),
(73, 'demam pertanda sudah radang akut', 'demam-pertanda-sudah-radang-akut', 'demam pertanda sudah radang akut', '<br>', 1, '2024-12-30 17:00:07', '2024-12-30 17:00:07'),
(74, 'Bengkak merah pada tulang dan sendi', 'bengkak-merah-pada-tulang-dan-sendi', 'Bengkak merah pada tulang dan sendi', '<br>', 1, '2024-12-30 17:00:18', '2024-12-30 17:00:18'),
(76, 'Demam tinggi', 'demam-tinggi', 'Demam tinggi', '<br>', 1, '2024-12-30 17:01:10', '2024-12-30 17:01:10'),
(77, 'adanya Luka terbuka (bernanah)', 'adanya-luka-terbuka-bernanah', 'adanya Luka terbuka (bernanah)', '<br>', 1, '2024-12-30 17:01:20', '2024-12-30 17:01:20'),
(78, 'Nyeri bahu kanan/kiri', 'nyeri-bahu-kanankiri', 'Nyeri bahu kanan/kiri', '<br>', 1, '2024-12-30 17:01:52', '2024-12-30 17:01:52'),
(79, 'Bahu terasa sulit untuk bergerak', 'bahu-terasa-sulit-untuk-bergerak', 'Bahu terasa sulit untuk bergerak', '<br>', 1, '2024-12-30 17:02:09', '2024-12-30 17:02:09'),
(80, 'Kaku bahu kanan/kiri', 'kaku-bahu-kanankiri', 'Kaku bahu kanan/kiri', '<br>', 1, '2024-12-30 17:02:18', '2024-12-30 17:02:18'),
(81, 'Sulit menggerakkan tangan kanan/kiri', 'sulit-menggerakkan-tangan-kanankiri', 'Sulit menggerakkan tangan kanan/kiri', '<br>', 1, '2024-12-30 17:02:27', '2024-12-30 17:02:27'),
(82, 'bahu Bisa bengkak kalo meradang', 'bahu-bisa-bengkak-kalo-meradang', 'bahu Bisa bengkak kalo meradang', '<br>', 1, '2024-12-30 17:02:39', '2024-12-30 17:02:39'),
(83, 'Nyeri pergelangan tangan kanan/kiri', 'nyeri-pergelangan-tangan-kanankiri', 'Nyeri pergelangan tangan kanan/kiri', '<br>', 1, '2024-12-30 17:02:49', '2024-12-30 17:02:49'),
(84, 'Terbatas ruang gerak sendi', 'terbatas-ruang-gerak-sendi', 'Terbatas ruang gerak sendi', '<br>', 1, '2024-12-30 17:03:03', '2024-12-30 17:03:03'),
(85, 'Bila pergelangan tangan ditekuk akan terasa nyeri', 'bila-pergelangan-tangan-ditekuk-akan-terasa-nyeri', 'Bila pergelangan tangan ditekuk akan terasa nyeri', '<br>', 1, '2024-12-30 17:03:17', '2024-12-30 17:03:17'),
(86, 'Nyeri siku kanan/kiri', 'nyeri-siku-kanankiri', 'Nyeri siku kanan/kiri', '<br>', 1, '2024-12-30 17:03:27', '2024-12-30 17:03:27'),
(87, 'Kaku siku', 'kaku-siku', 'Kaku siku', '<br>', 1, '2024-12-30 17:03:36', '2024-12-30 17:03:36'),
(88, 'Nyeri pada saat siku digerakkan ke luar (bilateral)', 'nyeri-pada-saat-siku-digerakkan-ke-luar-bilateral', 'Nyeri pada saat siku digerakkan ke luar (bilateral)', '<br>', 1, '2024-12-30 17:03:47', '2024-12-30 17:04:12'),
(89, 'Kaku otot punggung bawah', 'kaku-otot-punggung-bawah', 'Kaku otot punggung bawah', '<br>', 1, '2024-12-30 17:10:24', '2024-12-30 17:10:24'),
(90, 'Kebas lutut', 'kebas-lutut', 'Kebas lutut', '<br>', 1, '2024-12-30 17:10:39', '2024-12-30 17:10:39'),
(91, 'Kebas kaki', 'kebas-kaki', 'Kebas kaki', '<br>', 1, '2024-12-30 17:10:49', '2024-12-30 17:10:49'),
(92, 'Paha kebas kanan/kiri', 'paha-kebas-kanankiri', 'Paha kebas kanan/kiri', '<br>', 1, '2024-12-30 17:10:57', '2024-12-30 17:10:57'),
(93, 'Paha kanan/kiri berat', 'paha-kanankiri-berat', 'Paha kanan/kiri berat', '<br>', 1, '2024-12-30 17:11:05', '2024-12-30 17:11:05'),
(94, 'Nyeri punggung bawah', 'nyeri-punggung-bawah', 'Nyeri punggung bawah', '<br>', 1, '2024-12-30 17:11:12', '2024-12-30 17:11:12'),
(95, 'Nyeri pinggang bawah', 'nyeri-pinggang-bawah', 'Nyeri pinggang bawah', '<br>', 1, '2024-12-30 17:11:19', '2024-12-30 17:11:19'),
(96, 'Kesemutan punggung bawah', 'kesemutan-punggung-bawah', 'Kesemutan punggung bawah', '<br>', 1, '2024-12-30 17:11:30', '2024-12-30 17:11:30'),
(97, 'Kelemahan anggota gerak bawah (jika sudah berat)', 'kelemahan-anggota-gerak-bawah-jika-sudah-berat', 'Kelemahan anggota gerak bawah (jika sudah berat)', '<br>', 1, '2024-12-30 17:11:38', '2024-12-30 17:11:38'),
(98, 'Nyeri pinggul bawah', 'nyeri-pinggul-bawah', 'Nyeri pinggul bawah', '<br>', 1, '2024-12-30 17:11:52', '2024-12-30 17:11:52'),
(99, 'Nyeri punggung', 'nyeri-punggung', 'Nyeri punggung', '<br>', 1, '2024-12-30 17:12:00', '2024-12-30 17:12:00'),
(100, 'Nyeri pinggang', 'nyeri-pinggang', 'Nyeri pinggang', '<br>', 1, '2024-12-30 17:12:07', '2024-12-30 17:12:07'),
(101, 'Nyeri pinggul', 'nyeri-pinggul', 'Nyeri pinggul', '<br>', 1, '2024-12-30 17:12:14', '2024-12-30 17:12:14'),
(102, 'nyeri bokong', 'nyeri-bokong', 'nyeri bokong', '<br>', 1, '2024-12-30 17:12:21', '2024-12-30 17:12:21'),
(103, 'Nyeri kaki kanan/kiri', 'nyeri-kaki-kanankiri', 'Nyeri kaki kanan/kiri', '<br>', 1, '2024-12-30 17:12:28', '2024-12-30 17:12:28'),
(104, 'Tangan dan kaki gemeter', 'tangan-dan-kaki-gemeter', 'Tangan dan kaki gemeter', '<br>', 1, '2024-12-30 17:12:36', '2024-12-30 17:12:36'),
(105, 'Tungkai bawah terasa lemas/berat', 'tungkai-bawah-terasa-lemasberat', 'Tungkai bawah terasa lemas/berat', '<br>', 1, '2024-12-30 17:12:44', '2024-12-30 17:12:44'),
(106, 'Nyeri di sisi dalam siku', 'nyeri-di-sisi-dalam-siku', 'Nyeri di sisi dalam siku', '<br>', 1, '2024-12-30 17:13:44', '2024-12-30 17:13:44'),
(107, 'Kelemahan pada pergelangan tangan dan jari', 'kelemahan-pada-pergelangan-tangan-dan-jari', 'Kelemahan pada pergelangan tangan dan jari', '<br>', 1, '2024-12-30 17:13:54', '2024-12-30 17:13:54'),
(108, 'Nyeri saat menggenggam atau memutar pergelangan tangan', 'nyeri-saat-menggenggam-atau-memutar-pergelangan-tangan', 'Nyeri saat menggenggam atau memutar pergelangan tangan', '<br>', 1, '2024-12-30 17:14:03', '2024-12-30 17:14:03'),
(109, 'Rasa kaku pada siku', 'rasa-kaku-pada-siku', 'Rasa kaku pada siku', '<br>', 1, '2024-12-30 17:14:13', '2024-12-30 17:14:13'),
(110, 'Nyeri yang memburuk saat melakukan gerakan berulang', 'nyeri-yang-memburuk-saat-melakukan-gerakan-berulang', 'Nyeri yang memburuk saat melakukan gerakan berulang', '<br>', 1, '2024-12-30 17:14:24', '2024-12-30 17:14:24'),
(111, 'Terasa nyeri pada saat siku digerakkan kearah dalam (medial)', 'terasa-nyeri-pada-saat-siku-digerakkan-kearah-dalam-medial', 'Terasa nyeri pada saat siku digerakkan kearah dalam (medial)', '<br>', 1, '2024-12-30 17:14:37', '2024-12-30 17:14:37'),
(112, 'Nyeri pada jari2 tangan', 'nyeri-pada-jari2-tangan', 'Nyeri pada jari2 tangan', '<br>', 1, '2024-12-30 17:14:49', '2024-12-30 17:14:49'),
(113, 'Kelemahan otot kontraksi (jika sudah berat)', 'kelemahan-otot-kontraksi-jika-sudah-berat', 'Kelemahan otot kontraksi (jika sudah berat)', '<br>', 1, '2024-12-30 17:14:59', '2024-12-30 17:14:59'),
(114, 'Kebas tangan kanan/kiri', 'kebas-tangan-kanankiri', 'Kebas tangan kanan/kiri', '<br>', 1, '2024-12-30 17:15:07', '2024-12-30 17:15:07'),
(115, 'Nyeri telapak tangan', 'nyeri-telapak-tangan', 'Nyeri telapak tangan', '<br>', 1, '2024-12-30 17:15:16', '2024-12-30 17:15:16'),
(116, 'Nyeri tangan kanan/kiri', 'nyeri-tangan-kanankiri', 'Nyeri tangan kanan/kiri', '<br>', 1, '2024-12-30 17:15:25', '2024-12-30 17:15:25'),
(117, 'Pada malam hari sering kebangun karena rasa kebas tangan yang dirasakan', 'pada-malam-hari-sering-kebangun-karena-rasa-kebas-tangan-yang-dirasakan', 'Pada malam hari sering kebangun karena rasa kebas tangan yang dirasakan', '<br>', 1, '2024-12-30 17:15:34', '2024-12-30 17:15:34'),
(118, 'Nyeri pada jari tangan', 'nyeri-pada-jari-tangan', 'Nyeri pada jari tangan', '<br>', 1, '2024-12-30 17:15:45', '2024-12-30 17:15:45'),
(119, 'Keterbatasan gerak jari tangan', 'keterbatasan-gerak-jari-tangan', 'Keterbatasan gerak jari tangan', '<br>', 1, '2024-12-30 17:15:53', '2024-12-30 17:15:53'),
(120, 'Kaku jari tangan', 'kaku-jari-tangan', 'Kaku jari tangan', '<br>', 1, '2024-12-30 17:16:04', '2024-12-30 17:16:04'),
(121, 'Bunyi sendi jari tangan waktu diluruskan (dalam medis dikenal dengan sebutan snap yaitu terasa sakit saat membuka selubung tendon ke arah luar)', 'bunyi-sendi-jari-tangan-waktu-diluruskan-dalam-medis-dikenal-dengan-sebutan-snap-yaitu-terasa-sakit-saat-membuka-selubung-tendon-ke-arah-luar', 'Bunyi sendi jari tangan waktu diluruskan (dalam medis dikenal dengan sebutan snap yaitu terasa sakit saat membuka selubung tendon ke arah luar)', '<br>', 1, '2024-12-30 17:16:29', '2024-12-30 17:16:29'),
(122, 'Nyeri pada tulang belakang', 'nyeri-pada-tulang-belakang', 'Nyeri pada tulang belakang', '<br>', 1, '2024-12-30 17:16:40', '2024-12-30 17:17:19'),
(123, 'Nyeri punggung atas', 'nyeri-punggung-atas', 'Nyeri punggung atas', '<br>', 1, '2024-12-30 17:19:11', '2024-12-30 17:19:11'),
(124, 'Kesemutan pada area tulang belakang', 'kesemutan-pada-area-tulang-belakang', 'Kesemutan pada area tulang belakang', '<br>', 1, '2024-12-30 17:19:26', '2024-12-30 17:19:26'),
(125, 'Jalan tidak simetris / postur tubuh tidak simetris (jika sudah berat / sudut miringnya besar)', 'jalan-tidak-simetris-postur-tubuh-tidak-simetris-jika-sudah-berat-sudut-miringnya-besar', 'Jalan tidak simetris / postur tubuh tidak simetris (jika sudah berat / sudut miringnya besar)', '<br>', 1, '2024-12-30 17:19:39', '2024-12-30 17:19:39'),
(126, 'Cepat capek', 'cepat-capek', 'Cepat capek', '<br>', 1, '2024-12-30 17:19:47', '2024-12-30 17:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0 => male, 1 => female',
  `age` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 => banned, 1 => active',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => email unverified, 1 => email verified',
  `ver_code` varchar(255) DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'stores verification send time',
  `ban_reason` varchar(255) DEFAULT NULL,
  `login_by` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rm` varchar(255) NOT NULL COMMENT 'medic record number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `age`, `username`, `email`, `password`, `image`, `status`, `ev`, `ver_code`, `ver_code_send_at`, `ban_reason`, `login_by`, `remember_token`, `provider`, `provider_id`, `created_at`, `updated_at`, `rm`) VALUES
(7, 'aisyah', 'aqilah', 1, NULL, 'aisyah190704', 'aisyah190704@gmail.com', '$2y$12$ga2aYxb/I2NrWTuJZaBRa.xrKVvpunjAOQvbFtxqFK9j9qSDHULP6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:30', '2024-12-30 10:57:30', '190704'),
(8, 'darmiati', 'm.ali', 1, NULL, 'darmiati060279', 'darmiati060279@gmail.com', '$2y$12$L7QRWcyeDvupCPWriq1XduNGqLF7AQKtjEcOmYP8tRf9p07.O0n4y', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:31', '2024-12-30 10:57:31', '060279'),
(9, 'ratna', 'sari dewi', 1, NULL, 'ratna011302', 'ratna011302@gmail.com', '$2y$12$Yj9t0i8bmj/8TKlVuUGiKeAOta.z29h188hmFryQlzCHvhD9wCwwG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:31', '2024-12-30 10:57:31', '011302'),
(10, 'ismail', 'husein', 0, NULL, 'ismail190601', 'ismail190601@gmail.com', '$2y$12$l3fQcEG8arePiDyLgZWRCOdj/1FVtmZwDb1qan6ybuYTT7S.HAga2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:32', '2024-12-30 10:57:32', '190601'),
(11, 'razali', '', 0, NULL, 'razali033448', 'razali033448@gmail.com', '$2y$12$bV1szTtvTPI0Suj7K.TmVOYP1/N5O9R76u2ebTGV5pIGnnFxNbEfm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:32', '2024-12-30 10:57:32', '033448'),
(12, 'safiah', '', 1, NULL, 'safiah106750', 'safiah106750@gmail.com', '$2y$12$fHUO10ai0v4uziCW13Okqei.gG63HT3OLf4FrVasnIYz/oP1p3e/a', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:33', '2024-12-30 10:57:33', '106750'),
(13, 'rosmawati', '', 1, NULL, 'rosmawati177614', 'rosmawati177614@gmail.com', '$2y$12$1BzF0l5WXESY6fEn.EUaWO7Bz/LtMQuCIT6yFCcpwglr5WcRidDb6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:33', '2024-12-30 10:57:33', '177614'),
(14, 'nurfiyanti', 'ramadini', 1, NULL, 'nurfiyanti190915', 'nurfiyanti190915@gmail.com', '$2y$12$hdbyP/prcoUuKvStajCyCe/B3chVO.yjDmumv//mTriwQ.vuC4Axi', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:33', '2024-12-30 10:57:33', '190915'),
(15, 'putri', 'marita', 1, NULL, 'putri170176', 'putri170176@gmail.com', '$2y$12$0CmalE3iVYg648RIUxp0n.omeSnNpVC.s0RvYFOBLTyS3mqejgHLG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:34', '2024-12-30 10:57:34', '170176'),
(16, 'suarni', '', 1, NULL, 'suarni064990', 'suarni064990@gmail.com', '$2y$12$CCaT5pxpcEji7CCSe9XIJunpbFt.kbHStLfUK1GIFke0EyGNI36p6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:34', '2024-12-30 10:57:34', '064990'),
(17, 'muhammad', 'armansyah', 0, NULL, 'muhammad036900', 'muhammad036900@gmail.com', '$2y$12$IR.lIJo.b3NAbqY0hszR6.J5LoZIUX9V42dlNkQq1kqnuJ6UESkW6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:35', '2024-12-30 10:57:35', '036900'),
(18, 'rosmaina', '', 1, NULL, 'rosmaina013705', 'rosmaina013705@gmail.com', '$2y$12$n.HSierRmtIJp34uWxfdcepg3teozM7FH8wCnS4L21Jq4OguGKLny', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:35', '2024-12-30 10:57:35', '013705'),
(19, 'nuril', 'huda', 1, NULL, 'nuril009310', 'nuril009310@gmail.com', '$2y$12$oF4vBSo9E00ag88a/Ce9eebxl2HEAIdqbcZ8wSYSbG1O8Egm/65T6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:36', '2024-12-30 10:57:36', '009310'),
(20, 'nasywa', 'humaira', 1, NULL, 'nasywa189230', 'nasywa189230@gmail.com', '$2y$12$q4/d.NldT4qZcglv6Fs/cuq0XL.aVENhcRX3qS0dz81qTUNXM5Dq6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:36', '2024-12-30 10:57:36', '189230'),
(21, 'cut', 'nurmailah', 1, NULL, 'cut100360', 'cut100360@gmail.com', '$2y$12$2G5X7HM8XlpNVlx2vWDDH.ZEN9A/5MZPmqXoyglu5l2j77GJ/62Q2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:37', '2024-12-30 10:57:37', '100360'),
(22, 'ruhani', '', 1, NULL, 'ruhani055615', 'ruhani055615@gmail.com', '$2y$12$/QB/W8/PjN2qtW8cjPpOrOUqG0bXPSxKVHv74HL3PfE1eSaIraMES', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:37', '2024-12-30 10:57:37', '055615'),
(23, 'muhammad', 'rinaldi jufri', 0, NULL, 'muhammad032841', 'muhammad032841@gmail.com', '$2y$12$VA1nhB/GLqWYceML85MqRutdcEQ8cXET.3gBBM226LCZdgZKqJG9W', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:38', '2024-12-30 10:57:38', '032841'),
(24, 'karlina', '', 1, NULL, 'karlina146260', 'karlina146260@gmail.com', '$2y$12$tliQHx31JT9O/0LFm6/4hup.Za2k8w2zqwUZXPjBRmgoPK76/Aph2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:38', '2024-12-30 10:57:38', '146260'),
(25, 'zubaidah', '', 1, NULL, 'zubaidah029450', 'zubaidah029450@gmail.com', '$2y$12$1yuWBg4TJ/v24ZwwTNNYpeRU981mdy5It9ujCoyO6AaqDZboVC3pG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:39', '2024-12-30 10:57:39', '029450'),
(26, 'burhanuddin', '', 0, NULL, 'burhanuddin015444', 'burhanuddin015444@gmail.com', '$2y$12$z98Hn/85a6VxLEKMd4FMG.r.FQkoRXQDhizFw/Ai6ryDdAtsJfmO2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:39', '2024-12-30 10:57:39', '015444'),
(27, 'r', 'suherna', 1, NULL, 'r180631', 'r180631@gmail.com', '$2y$12$AGzgChgLnF8d64iOFAUjCu08hoj/0JRKz.V3/qKHQTfb1EjiFXwo2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:40', '2024-12-30 10:57:40', '180631'),
(28, 'tarmizi', '', 0, NULL, 'tarmizi189023', 'tarmizi189023@gmail.com', '$2y$12$RrXLZ7li07VqjI.hvG9vE.706.qmHkHG.J2RecTJMzgEV6enaCxNO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:40', '2024-12-30 10:57:40', '189023'),
(29, 'sulaimi', '', 1, NULL, 'sulaimi183606', 'sulaimi183606@gmail.com', '$2y$12$X1T/3H8iRn61MPBjGFz5HuEM3IhVK29gFEmPuCnpsbY/5HuzMY/2S', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:41', '2024-12-30 10:57:41', '183606'),
(30, 'rasyidah', '', 1, NULL, 'rasyidah147275', 'rasyidah147275@gmail.com', '$2y$12$8eL17bW5xUIwUbARU4tmSOgmM.qJDMODUtybtx25q6x8l/hU0SneS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:41', '2024-12-30 10:57:41', '147275'),
(31, 'nurasyidah', '', 1, NULL, 'nurasyidah065871', 'nurasyidah065871@gmail.com', '$2y$12$t/dTo5Tm7BhOxLF6LymT0O7PJ4NT6oY7y6TqJZVSECbgPHwS/vNiK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:42', '2024-12-30 10:57:42', '065871'),
(32, 'yusri', '', 0, NULL, 'yusri005964', 'yusri005964@gmail.com', '$2y$12$Ki7qJ3IxiT833x..d4aJeupKDBfa7K2mhKH5niSRW58R9ahOBhIEi', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:42', '2024-12-30 10:57:42', '005964'),
(33, 'mutia', 'farida', 1, NULL, 'mutia56272', 'mutia56272@gmail.com', '$2y$12$AzT1XIfwwM1QOPnpzhv.A.LC2Hmz8h69EAcEjWXEtz3hkGtvuVmn.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:43', '2024-12-30 10:57:43', '56272'),
(34, 'delimawati', '', 1, NULL, 'delimawati165085', 'delimawati165085@gmail.com', '$2y$12$zCvKHwHZ2uNEPlP1XKcLkuF87ut92N72FS5wmxC.fgGE.seXgZMRe', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:43', '2024-12-30 10:57:43', '165085'),
(35, 'tajudin', '', 0, NULL, 'tajudin145604', 'tajudin145604@gmail.com', '$2y$12$FItkeI30LvU4ed0VTaRDyukameISn53IQ2IOfWFuKshrB99CRoE8i', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:44', '2024-12-30 10:57:44', '145604'),
(36, 'abd', 'rani', 1, NULL, 'abd034204', 'abd034204@gmail.com', '$2y$12$mazF432wIUzIwldC7Y9wKOGB670KGaXrdv.SanK2DYwMVWS3p3F/q', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:44', '2024-12-30 10:57:44', '034204'),
(37, 'zahriani', '', 1, NULL, 'zahriani006385', 'zahriani006385@gmail.com', '$2y$12$fCq6FLmOGnhlADg08Rp.1O0gxBoMRoZTXt8/REL/MxXuxI96suTyS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:44', '2024-12-30 10:57:44', '006385'),
(38, 'luqman', '', 0, NULL, 'luqman190541', 'luqman190541@gmail.com', '$2y$12$W0Mq7.ut/GJpUc9U2j4S5OG1OxNTQSqQc84MenvePWXAbu.JEUrpW', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:45', '2024-12-30 10:57:45', '190541'),
(39, 'syukriah', '', 1, NULL, 'syukriah000833', 'syukriah000833@gmail.com', '$2y$12$eHB2J8a6ytSOAFQZLCgkdeDck2BkaOeovXQOI0SwrsrdBNMIznfk6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:45', '2024-12-30 10:57:45', '000833'),
(40, 'nuraini', '', 1, NULL, 'nuraini175465', 'nuraini175465@gmail.com', '$2y$12$X3tI47sI5ARkBAplzkYo/e9G1s2U5mON7LfeW5utNlM9WqOfwLAp.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:46', '2024-12-30 10:57:46', '175465'),
(41, 'fajariah', '', 1, NULL, 'fajariah178702', 'fajariah178702@gmail.com', '$2y$12$YcX7Lnr.LubKQu6YKYPGA.LDYjKtPnPP4BsN7CTC2OffWQyp4XRgS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:46', '2024-12-30 10:57:46', '178702'),
(42, 'saniah', '', 1, NULL, 'saniah122820', 'saniah122820@gmail.com', '$2y$12$pn.LvcCZQSYIFnvwuPvDC.YtiB/h47dKZ3IL2AQGxXw1Y8S5CX/dG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:47', '2024-12-30 10:57:47', '122820'),
(43, 'syahniar', '', 1, NULL, 'syahniar102116', 'syahniar102116@gmail.com', '$2y$12$4XjQiIFnanQEPTbKyAFL1eK1qhDsKQpr/6Xm9HztTU6O82kjYCM9G', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:47', '2024-12-30 10:57:47', '102116'),
(44, 'juhairiah', '', 1, NULL, 'juhairiah062171', 'juhairiah062171@gmail.com', '$2y$12$pimpIGXw54jcQOKzSPxUgeJrZPhICynX/oz6pox1yE6oAld/rcGZG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 10:57:48', '2024-12-30 10:57:48', '062171'),
(45, 'azizah', '', 1, NULL, 'azizah178738', 'azizah178738@gmail.com', '$2y$12$Jb/7niex3.zGnMXzOvoMiO0nbYDUwgq4iimO2EucZuiUAlduRpRbG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:27', '2024-12-30 14:42:27', '178738'),
(46, 'ismanidar', '', 1, NULL, 'ismanidar041191', 'ismanidar041191@gmail.com', '$2y$12$FrqFH2fY5tCxc1If.welDeD46TZzo8pM/3PYYOZu2R0kCAXUWxGn.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:27', '2024-12-30 14:42:27', '041191'),
(47, 'tajir', 'ikhwani', 1, NULL, 'tajir182508', 'tajir182508@gmail.com', '$2y$12$pe595IsBTDKQsVl3JyGodOOnOrmbSz6bO//jA.6DUCD0CUWjAs1yS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:28', '2024-12-30 14:42:28', '182508'),
(48, 'jarmaliah', '', 1, NULL, 'jarmaliah155917', 'jarmaliah155917@gmail.com', '$2y$12$eFJ4mxlhRNuf6iOSNwhvqud37WopR6JbCfch9a1e13GWetVRhO.gi', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:28', '2024-12-30 14:42:28', '155917'),
(49, 'ariani', '', 1, NULL, 'ariani090763', 'ariani090763@gmail.com', '$2y$12$lTw39z3UCZ81BKRQnXq.ZeT4vxQ/0XiyvX6r7MUyop1CmAY7MYdTq', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:29', '2024-12-30 14:42:29', '090763'),
(50, 'cut', 'rulnasti', 1, NULL, 'cut079922', 'cut079922@gmail.com', '$2y$12$uaVS1nq/TO4CD7zIHyUK9u424YKvUywfVAcomOnygplBv0yGhz9AK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:29', '2024-12-30 14:42:29', '079922'),
(51, 'ibrahim', 'nyausni', 0, NULL, 'ibrahim024305', 'ibrahim024305@gmail.com', '$2y$12$CAqLTh.EDd4ORZXxIBNTQuORI16HCp8NLy7V6/4kLWSOpZW7dKqSm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:30', '2024-12-30 14:42:30', '024305'),
(52, 'muhammad', 'hasan', 0, NULL, 'muhammad006362', 'muhammad006362@gmail.com', '$2y$12$zUT64VVYr/XRvGywuDrNn.MbpF660bzACsbnnale7Qi1hZNP35HY.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:30', '2024-12-30 14:42:30', '006362'),
(53, 'zuraida', '', 1, NULL, 'zuraida155216', 'zuraida155216@gmail.com', '$2y$12$O.6ngJijYa24nKZcy4vn7e36pFd7AroJ9FrC0unT0DISv7Ck5Q.4S', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:31', '2024-12-30 14:42:31', '155216'),
(54, 'teuku', 'marwan amri', 0, NULL, 'teuku023914', 'teuku023914@gmail.com', '$2y$12$W/SGLtc7hm7H68PqDOvh6OSuRmx/X8ujC2x.dYCSMoz3O2h4lgCJ2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:31', '2024-12-30 14:42:31', '023914'),
(55, 'fatimah', '', 1, NULL, 'fatimah163489', 'fatimah163489@gmail.com', '$2y$12$BdS2PMS8Som7bZpqbXgSmOJOy0XEalppm/evuAwZGU..2niHIHf7q', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:32', '2024-12-30 14:42:32', '163489'),
(56, 'fakhruddin', '', 0, NULL, 'fakhruddin165143', 'fakhruddin165143@gmail.com', '$2y$12$joU4h0.NIOHreXNW2RRN0uqp5nq00hyUvwXnkrUMfxRYKdViLX/Fe', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:32', '2024-12-30 14:42:32', '165143'),
(57, 'udin', 'rivana', 0, NULL, 'udin029915', 'udin029915@gmail.com', '$2y$12$DeIp3aIgvJv.otSCqcIy2ucLKBvrWdQsQbnSnUhRtR.Au7or4Uxt2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:33', '2024-12-30 14:42:33', '029915'),
(58, 'bustaman', '', 0, NULL, 'bustaman009189', 'bustaman009189@gmail.com', '$2y$12$/1ihPcq.k269dCxRVqk99.1UHWJiPg2tvVLeRZE7UcYNk7EmqNKju', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:42:33', '2024-12-30 14:42:33', '009189'),
(60, 'jauhari', 'ramli', 0, NULL, 'jauhari035647', 'jauhari035647@gmail.com', '$2y$12$PwrlYbmUWAECXytz61ewk.45SSlsdsw/obH7bvvFebLA3OP0NvWCW', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:28', '2024-12-30 14:56:28', '035647'),
(61, 'aiyob', 'kooy', 0, NULL, 'aiyob061768', 'aiyob061768@gmail.com', '$2y$12$IFjpbVT4QTlAyaDdVKaOuedSIKClF.5t0URa79zOyAk3L8Z1xrRri', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:28', '2024-12-30 14:56:28', '061768'),
(62, 'husen', 'zainal', 0, NULL, 'husen001559', 'husen001559@gmail.com', '$2y$12$xpDfQWN3RsizLnYDuta99.5a0oxEWiTtgsMhdQjfngIy1erR8TFiO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:29', '2024-12-30 14:56:29', '001559'),
(63, 'safniati', '', 1, NULL, 'safniati015953', 'safniati015953@gmail.com', '$2y$12$eIifLb08eep6O3CexlL78Oem.5aw/3HTyZbFnUkcXekCEfE2X2nSe', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:29', '2024-12-30 14:56:29', '015953'),
(64, 'farlida', '', 1, NULL, 'farlida041917', 'farlida041917@gmail.com', '$2y$12$makatqyhJQYvw2f.2dWeV.VV8zlEWvz6/MM15lEHC1LAxzJi20EHq', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:30', '2024-12-30 14:56:30', '041917'),
(65, 'yasin', '', 0, NULL, 'yasin032968', 'yasin032968@gmail.com', '$2y$12$C0/aftLU8kl0lLX6RoeBQeRvKgJ6GNYPBez6MNlsz8tbM6i6nlY.W', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:30', '2024-12-30 14:56:30', '032968'),
(66, 'hasmansyah', '', 0, NULL, 'hasmansyah031571', 'hasmansyah031571@gmail.com', '$2y$12$3ERPVY7rBTtzBueMlR8tvuwYyNBkWHWKNVcAPTFwJDwpuFeVjbRDO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:30', '2024-12-30 14:56:30', '031571'),
(67, 'dedi', 'rahmat', 0, NULL, 'dedi185766', 'dedi185766@gmail.com', '$2y$12$zunzkrCsCXrZOUnwNtR.SuwbtBAQ42fI1nWQlVbOnR92y7iROYH0y', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:31', '2024-12-30 14:56:31', '185766'),
(68, 'zulkifli', '', 0, NULL, 'zulkifli192166', 'zulkifli192166@gmail.com', '$2y$12$BqZ73mjs34s7VPM3y6YhbupcgB9Qgk1CAdP3MfcqKZKwNjAA2TgwO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:31', '2024-12-30 14:56:31', '192166'),
(69, 'arifin', '', 0, NULL, 'arifin098235', 'arifin098235@gmail.com', '$2y$12$4uYhosFDxzcuBazRpI/gheIMzbzPf5nAYcSVJWTnKBPqrsycZK2Ja', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:32', '2024-12-30 14:56:32', '098235'),
(70, 'ria', 'amatul hakim', 1, NULL, 'ria005130', 'ria005130@gmail.com', '$2y$12$eHS03fw49NUQys0dJAO79ej4NKa9/M6ZJgo6ePF4Ycph6noB3yW0O', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:32', '2024-12-30 14:56:32', '005130'),
(71, 'siti', 'nurhayati', 1, NULL, 'siti067122', 'siti067122@gmail.com', '$2y$12$ZRnKebeob7DZeYcasI5zheE7UAdOYzRs4O2uKIklpH/L.4TynxKOa', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:33', '2024-12-30 14:56:33', '067122'),
(72, 'elly', 'rosmawati', 1, NULL, 'elly011314', 'elly011314@gmail.com', '$2y$12$9ovaKgRXSsAPPNKFWvRliOqqvtz9u0GIy9LKNUtHwBqjYvbqMWLna', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:33', '2024-12-30 14:56:33', '011314'),
(73, 'ridwan', 'h. idrus', 0, NULL, 'ridwan156347', 'ridwan156347@gmail.com', '$2y$12$D7MkeV8Ms.aU3b3if5Chz.r1Z9KKILqVisWWE7qo6mpyFTvmJW2xO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:34', '2024-12-30 14:56:34', '156347'),
(74, 'yusrawati', '', 1, NULL, 'yusrawati178778', 'yusrawati178778@gmail.com', '$2y$12$.kIRzgaVquwtA8A7JBBal.BWQAIstpyJJYAzcHWEuiJ5Opq.Mw6z2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:34', '2024-12-30 14:56:34', '178778'),
(75, 'nilawati', '', 1, NULL, 'nilawati185693', 'nilawati185693@gmail.com', '$2y$12$CIAmGMFaIF68YBi7VhoBluulzZoitUg12a8n4Lga2wvEeGVzESqRO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:35', '2024-12-30 14:56:35', '185693'),
(76, 'amiruddin', '', 0, NULL, 'amiruddin036134', 'amiruddin036134@gmail.com', '$2y$12$QPgV5gQiqJxY6ClZEEbIqORlKb3hg0qZKbnmyPNcaQabr96Y763OG', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:35', '2024-12-30 14:56:35', '036134'),
(77, 'sutri', 'helfianti', 1, NULL, 'sutri106906', 'sutri106906@gmail.com', '$2y$12$xumH71ZZ/iuMcCNqShhzEO38LLSTRqP3.5I20F8UAHfXAzohdtxSm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:35', '2024-12-30 14:56:35', '106906'),
(78, 'suardian', 'ramli', 0, NULL, 'suardian022421', 'suardian022421@gmail.com', '$2y$12$iNmYJ21cRTgFn2BPA5T49edA7ffE4i6YlKDbL0r8nlSv4rcRjuUv6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:36', '2024-12-30 14:56:36', '022421'),
(79, 'hamdan', 'ibrahim', 0, NULL, 'hamdan030233', 'hamdan030233@gmail.com', '$2y$12$CxOBL2OGCN3myXqLA1eQo.mNNH9OnmF.0FYV2C5jOZsxEMOgLBX4W', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:36', '2024-12-30 14:56:36', '030233'),
(80, 'rahmah', '', 1, NULL, 'rahmah022578', 'rahmah022578@gmail.com', '$2y$12$dntB8u2DAFN7THzgEZyBi.xEovEl3v9hmukdnw9XOiA6btdveRWay', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:37', '2024-12-30 14:56:37', '022578'),
(81, 'depy', 'ismarita', 1, NULL, 'depy197125', 'depy197125@gmail.com', '$2y$12$ucB0eFe/XA4EBA1BiIVq4erUW9VkR.sCCamFsDGAzdyiKU75LnymK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:37', '2024-12-30 14:56:37', '197125'),
(82, 'eva', 'suswaty', 1, NULL, 'eva005595', 'eva005595@gmail.com', '$2y$12$JduS/UWKLdv4ABmd7EQKDOHPfS9dKkJ/WQ0f.hlhQeNT1AIhyHl8G', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:38', '2024-12-30 14:56:38', '005595'),
(83, 'dien', 'indra meutia', 1, NULL, 'dien022227', 'dien022227@gmail.com', '$2y$12$hXXTXt4sNoC3Aw0cC37vyO0.IUXhd0ElvGakabVBkzulKgnxHToKi', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 14:56:38', '2024-12-30 14:56:38', '022227'),
(84, 'miswarli', 'z.', 0, NULL, 'miswarli031988', 'miswarli031988@gmail.com', '$2y$12$DyT2v5vrdEOIIuI/6QcREOqKMBvMoT.5EwH9Jcn7gg.sEvu2aHVii', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:22', '2024-12-30 15:22:22', '031988'),
(85, 'srimaryam', '', 1, NULL, 'srimaryam031656', 'srimaryam031656@gmail.com', '$2y$12$tpcngPuaO5BGA/ybEfHNDeF4NRx00B4ufUHAkDZv5DB94nv.sHk1G', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:23', '2024-12-30 15:22:23', '031656'),
(86, 'ridwan', 'saleh', 0, NULL, 'ridwan074215', 'ridwan074215@gmail.com', '$2y$12$ICZJ1krqkKdqS959l/VOtOXJs1ZjysV2XTeZT1306gDTCrwifw3LC', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:23', '2024-12-30 15:22:23', '074215'),
(87, 'rosna', 'adam', 1, NULL, 'rosna67864', 'rosna67864@gmail.com', '$2y$12$PKtGn/n6ptt85ScBeCbBb.4z60N/J8jz6PjIPpdvwcGdFOdqyPYpq', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:24', '2024-12-30 15:22:24', '67864'),
(88, 'muhammad', 'tahir', 0, NULL, 'muhammad035161', 'muhammad035161@gmail.com', '$2y$12$zHbgzY6Z8kX3sNfWFyK7lemj9AWLbiQZlwBzAHkktbecoRruscyie', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:24', '2024-12-30 15:22:24', '035161'),
(89, 'ainon', 'yunus', 0, NULL, 'ainon2320', 'ainon2320@gmail.com', '$2y$12$ma9tZeLq4M5dP685nYBkueZrBJD.7rDd.lm4dfPf4J47KmjkCgqQ.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:25', '2024-12-30 15:22:25', '2320'),
(90, 'iskandar', '', 0, NULL, 'iskandar075479', 'iskandar075479@gmail.com', '$2y$12$QBZyBWOR5LnpAR1u7DIhkOJ1hozv73Shyo5IG7c/Kb9GU0DpK7cAa', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:25', '2024-12-30 15:22:25', '075479'),
(91, 'marzuki', '', 0, NULL, 'marzuki002883', 'marzuki002883@gmail.com', '$2y$12$2LWOBDLzBb8XqvokhUSCIu5WiAWRvceuS2n.RbftxYhvyO2IzXAQm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:26', '2024-12-30 15:22:26', '002883'),
(92, 'rahmad', '', 0, NULL, 'rahmad022978', 'rahmad022978@gmail.com', '$2y$12$gTH0hHC/P.Ddqqw8k1O.4uXh0WxmQ0sOnue1.p7FSjzAqW/K2NJ8y', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:26', '2024-12-30 15:22:26', '022978'),
(93, 'azhar', '', 0, NULL, 'azhar071347', 'azhar071347@gmail.com', '$2y$12$5DUaUdLQhgeGxwFdS823ROs.tpP8fvAeUvcBC5FTuT/EHJhTEnM6.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:27', '2024-12-30 15:22:27', '071347'),
(94, 'anike', 'syahputri', 1, NULL, 'anike108277', 'anike108277@gmail.com', '$2y$12$psB9nkF2fr2ixv4uIc1HWud/x.6SytmGjkPDnD5vUulucAMqKYsQO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:27', '2024-12-30 15:22:27', '108277'),
(95, 'abdul', 'rani', 1, NULL, 'abdul14629', 'abdul14629@gmail.com', '$2y$12$oUHlVqTeekZxuw2v5gYXaulEwYAvHA1yYl0RTbfXittj450B9j6Ku', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:28', '2024-12-30 15:22:28', '14629'),
(96, 'rasmiati', '', 1, NULL, 'rasmiati126346', 'rasmiati126346@gmail.com', '$2y$12$k0WHZERsfSvrhaJMzydHUubtcAUG8Pj5pkNexlLGGvbThLicpWhE2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:28', '2024-12-30 15:22:28', '126346'),
(97, 'maryani', '', 1, NULL, 'maryani085886', 'maryani085886@gmail.com', '$2y$12$GpY5yEEZ1uqOOgoLKnN8kOmI.yIWZDdRCrwEcSFnXiPcwtsFFN6j.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:29', '2024-12-30 15:22:29', '085886'),
(98, 'laila', 'rahmani', 1, NULL, 'laila060185', 'laila060185@gmail.com', '$2y$12$g48RETjbonJjkqb9s6dVnubCHJTPID2BqRPSLQ8PFJvdYLoEk9Qla', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:29', '2024-12-30 15:22:29', '060185'),
(99, 'laura', 'oktaviany marantika', 1, NULL, 'laura146634', 'laura146634@gmail.com', '$2y$12$v96yAeNj5MjtLxHtT7ViEOkOWT1busugwQJft4iTmInc2OEF251ka', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:29', '2024-12-30 15:22:29', '146634'),
(100, 'zubaidah', '', 1, NULL, 'zubaidah010719', 'zubaidah010719@gmail.com', '$2y$12$OudQrp8yj8E.2q.EO3OPfOSb6aSd5M4CwrFEneMh6Nik6.nk1tmiS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:30', '2024-12-30 15:22:30', '010719'),
(101, 'suyanto', '', 0, NULL, 'suyanto192078', 'suyanto192078@gmail.com', '$2y$12$KOOpdgWHUvCSjbryJISpROjLAg0hXKRFw4nfoOEZXdp6G762U5m6e', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:30', '2024-12-30 15:22:30', '192078'),
(102, 'nurlatifah', '', 1, NULL, 'nurlatifah031124', 'nurlatifah031124@gmail.com', '$2y$12$t9BLBokec7YgAs68lCiKM.q01m3CDEfd3EykddH9s17bD1a2Jh0r.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:31', '2024-12-30 15:22:31', '031124'),
(103, 'sri', 'murni', 1, NULL, 'sri175510', 'sri175510@gmail.com', '$2y$12$0eB3xO5L2iiKHiezbVVh3ehnKi9pUZQbe7awfn5yYATK1tt.x/HnW', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:31', '2024-12-30 15:22:31', '175510'),
(104, 'muhammad', 'zein aly', 0, NULL, 'muhammad122519', 'muhammad122519@gmail.com', '$2y$12$X.qETLejlrsQ0HsXJ3tVxOL/mosZXOjDoYNP7HT3SEh3NQJTGuiKK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:32', '2024-12-30 15:22:32', '122519'),
(105, 'syahruramadhaini', '', 0, NULL, 'syahruramadhaini190876', 'syahruramadhaini190876@gmail.com', '$2y$12$Mv6gC6XGumDroHeDeTyaY.i4oSg/X4yeKozQOH4TULx2xgdzUGL5W', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:32', '2024-12-30 15:22:32', '190876'),
(106, 'sultidar', '', 1, NULL, 'sultidar043751', 'sultidar043751@gmail.com', '$2y$12$jKix4Vwr3YJDJvuq47khXe2zAsKT71fhSG/Fgyrm/.IhJBLHDnbJm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:33', '2024-12-30 15:22:33', '043751'),
(107, 'irma', 'liana kaf', 1, NULL, 'irma191308', 'irma191308@gmail.com', '$2y$12$ESmLswGcL1CClUCg7gM2SOH78Oms/LF6Li3qR17yOF8WyhXxmhtVm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:33', '2024-12-30 15:22:33', '191308'),
(108, 'kartini', '', 1, NULL, 'kartini190952', 'kartini190952@gmail.com', '$2y$12$I3G2ifFUmW96/VXqTSLKGuU98cQlxmpmjNZzMUaeKV0/9Y8m0aUQS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:34', '2024-12-30 15:22:34', '190952'),
(109, 'ernawati', '', 1, NULL, 'ernawati036695', 'ernawati036695@gmail.com', '$2y$12$q/9iU2DRIVqFWcdIdHxs0.p/1o3S2X0Cp76d6H85KU1yuojFvf7SC', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:34', '2024-12-30 15:22:34', '036695'),
(110, 'cut', 'nurma', 1, NULL, 'cut064690', 'cut064690@gmail.com', '$2y$12$DuckokXtjs21Q7ym4CjtwOEvd5wPegCBF/BA1JxUnVhAufiF68QtK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:35', '2024-12-30 15:22:35', '064690'),
(111, 'uba', 'lumbam raja', 0, NULL, 'uba122584', 'uba122584@gmail.com', '$2y$12$0/xCrsb4hmqFyHssrX0/7e3CuNxQFhkVGb82QomWD.GO6FMl8342e', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:35', '2024-12-30 15:22:35', '122584'),
(112, 'mukhlis', '', 0, NULL, 'mukhlis075690', 'mukhlis075690@gmail.com', '$2y$12$RXD51xts2wBvp934KZ0KNe7LlHB67EEPQVkiyieVcc2xA.NkUS/Se', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:35', '2024-12-30 15:22:35', '075690'),
(113, 'hasni', '', 1, NULL, 'hasni093285', 'hasni093285@gmail.com', '$2y$12$O0lSRssxHG6cHtTZ0WB5Fu2zbT2woCXlIfakP9c4XkFf4BFkKf1DW', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:36', '2024-12-30 15:22:36', '093285'),
(114, 'effendi', 'sulaiman', 0, NULL, 'effendi152628', 'effendi152628@gmail.com', '$2y$12$Z94sYpWjB5Ps0CmezIjaUeFhayI0W8rDrYKOTSxd/ZzOeS41/tJqO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:36', '2024-12-30 15:22:36', '152628'),
(115, 'yulidar', 'lestari', 1, NULL, 'yulidar003640', 'yulidar003640@gmail.com', '$2y$12$ZtuScSAAV/M4znknzVxpM.WjrmXcK0k.pvl6dJ0Qm0eJbcoXBNAma', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:37', '2024-12-30 15:22:37', '003640'),
(116, 'nasriah', '', 1, NULL, 'nasriah057858', 'nasriah057858@gmail.com', '$2y$12$YtHFGltjsGAewO9FBWiQwOOxZThRIm2OP3oIt/QavgE3stUglAfI6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:37', '2024-12-30 15:22:37', '057858'),
(117, 'rini', 'aprianti', 1, NULL, 'rini176948', 'rini176948@gmail.com', '$2y$12$JTkLC8ifcQ68bDJQjL5rC.uH6/s7Pa6zF2vYWFFZIGZHfxJ.3CrZm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:38', '2024-12-30 15:22:38', '176948'),
(118, 'sumarni', '', 1, NULL, 'sumarni152743', 'sumarni152743@gmail.com', '$2y$12$hkldivLgxkAbSvPw6bEeLObkHxNU9BMQBlPSB4GqcYEcOzMlxPIje', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:38', '2024-12-30 15:22:38', '152743'),
(119, 'sri', 'wagini', 1, NULL, 'sri193902', 'sri193902@gmail.com', '$2y$12$yRO0rqJgJCjVCKektkE5CeRY7dwb7wER9XctaXNcBgiJ/eHcm/.oC', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:39', '2024-12-30 15:22:39', '193902'),
(120, 'muchtaruddin', '', 0, NULL, 'muchtaruddin190003', 'muchtaruddin190003@gmail.com', '$2y$12$HWbZd8eyvieL8osOPioj.elTc/H/Ncfcru8wlPRqqWX9wrKCjq53O', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:39', '2024-12-30 15:22:39', '190003'),
(121, 'andi', 'mirza', 0, NULL, 'andi181035', 'andi181035@gmail.com', '$2y$12$WSgRCBXa6UoMJC0129icX.qE5jWh.6uqDzF3oXP8.BrJbxD5pH7NS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:40', '2024-12-30 15:22:40', '181035'),
(122, 'jamailiah', '', 1, NULL, 'jamailiah036696', 'jamailiah036696@gmail.com', '$2y$12$cyRKsrCOrlgREp1Klwl1Z.ZJ4dOkv8mPYMZjKNwO6FUSHecpPuUWa', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:22:40', '2024-12-30 15:22:40', '036696'),
(123, 'teuku', 'rusli', 0, NULL, 'teuku046713', 'teuku046713@gmail.com', '$2y$12$yaMZ0lyhvqsChr1/WtLC3.RUSmUZNgyv5zVzbvqDD015R3PRB0dE6', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:15', '2024-12-30 15:39:15', '046713'),
(124, 'rosnawati', '', 1, NULL, 'rosnawati109011', 'rosnawati109011@gmail.com', '$2y$12$rrQgAuKoo9JfeCMeEMbH2.U2zPmQwdSdrr3kjrSl1l5NyQcph15a2', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:16', '2024-12-30 15:39:16', '109011'),
(125, 'burhan', 'yusuf', 0, NULL, 'burhan096702', 'burhan096702@gmail.com', '$2y$12$fun809RsF7VhJOckhaJPA.1yca.4Ev.Ana6pEYNuFnGBud4JLh//O', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:16', '2024-12-30 15:39:16', '096702'),
(126, 'muhammad', 'amin abdullah', 0, NULL, 'muhammad085795', 'muhammad085795@gmail.com', '$2y$12$Jx6ID29vMb5VXyLG8TTaXOtff7vBDmYPF/7ZA9rFkzwNR.Zpyo.Da', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:17', '2024-12-30 15:39:17', '085795'),
(127, 'rumiyati', 'husin', 0, NULL, 'rumiyati192917', 'rumiyati192917@gmail.com', '$2y$12$I365ehOsxWEVBgAJXf6wVu2Pi.RGrglVu5ksxCAsZxoMIDf.uO28m', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:17', '2024-12-30 15:39:17', '192917'),
(128, 'rika', 'yulia', 0, NULL, 'rika41880', 'rika41880@gmail.com', '$2y$12$rAm9tryuukL3M/MwfA4NOelRnP9yjz21GL8xzKZKqT/1Jh6DBOAIq', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:18', '2024-12-30 15:39:18', '41880'),
(129, 'muliana', '', 1, NULL, 'muliana193037', 'muliana193037@gmail.com', '$2y$12$kGBHM7Uj3Yq7cPesQQHHMuixFR4TMBBaPi6d7YLHTYezuUcwUXA4S', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:18', '2024-12-30 15:39:18', '193037'),
(130, 'jauhari', '', 0, NULL, 'jauhari008202', 'jauhari008202@gmail.com', '$2y$12$VbT.eAVd4PdAo4DoGKauDehVtH4HxYvyu1l7PWGCj/34UKb.DlumS', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:19', '2024-12-30 15:39:19', '008202'),
(131, 'wirdah', '', 1, NULL, 'wirdah193234', 'wirdah193234@gmail.com', '$2y$12$kWrnGkb7uV/oVL1YyRCiB.YZLKepkqbI3tFESaDXn1rXCar.Qol3G', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:19', '2024-12-30 15:39:19', '193234'),
(132, 'syarifah', '', 1, NULL, 'syarifah017482', 'syarifah017482@gmail.com', '$2y$12$OtYwy/8o65FywOmFOGTTxeP2al9.B.bBevgmRjQ8bNTFFR9sY719S', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:20', '2024-12-30 15:39:20', '017482'),
(133, 'aniki', '', 1, NULL, 'aniki86655', 'aniki86655@gmail.com', '$2y$12$7eIccAjelsyCaScX8TgB.exyMru5WBQqwU8m.7X7vKDrhZfQrGtkO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:20', '2024-12-30 15:39:20', '86655'),
(134, 'hismaida', '', 1, NULL, 'hismaida073587', 'hismaida073587@gmail.com', '$2y$12$x8fJKNJWtgaSGY7gFsb/HOZe86qlyRwJAWKPZ8.bKvdqnC.RKcYPm', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:21', '2024-12-30 15:39:21', '073587'),
(135, 'khairiah', '', 1, NULL, 'khairiah000413', 'khairiah000413@gmail.com', '$2y$12$CtryzSB.xIXPTJI6cHyMzuaUZRZROXscVBd7WmXlziUozljwwD776', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:21', '2024-12-30 15:39:21', '000413'),
(136, 'safiarni', '', 1, NULL, 'safiarni083715', 'safiarni083715@gmail.com', '$2y$12$hBCg1X/lmKKnIV/.5w.iNOjZErHwr4WXXGPoMRAqlq7ITPWz37XgK', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:21', '2024-12-30 15:39:21', '083715'),
(137, 'halimatu', 'sakdiah', 1, NULL, 'halimatu90493', 'halimatu90493@gmail.com', '$2y$12$LRSszIBgGm/YxLdJwOBZZu4AmidxfoqEF2CJEawqW9LFJC7VFXTmC', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:22', '2024-12-30 15:39:22', '90493'),
(138, 'zainabon', '', 0, NULL, 'zainabon18581', 'zainabon18581@gmail.com', '$2y$12$uxAmZ09VVJ7clFoLT/KJP.cQumbPm5xNRYh0SuMeiLlMRF0bOlqee', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:22', '2024-12-30 15:39:22', '18581'),
(139, 'mahyuni', '', 1, NULL, 'mahyuni186061', 'mahyuni186061@gmail.com', '$2y$12$PEt1rs45v/5Xc2dFSal1rOMR2QCml5oOaRrfHlZRPgqKgOwlQ2Rv.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:23', '2024-12-30 15:39:23', '186061'),
(140, 'ir munir', 'bakri', 0, NULL, 'ir munir028914', 'ir munir028914@gmail.com', '$2y$12$lMBkilKePC0k1mQmYxUWgeXWCVPAJMM3zjqd7YWth4D/0e6WdWJ5e', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:23', '2024-12-30 15:39:23', '028914'),
(141, 'teuku', 'syamsir', 0, NULL, 'teuku128340', 'teuku128340@gmail.com', '$2y$12$cHV4ltwOR9zN9tnvTZ.Yt.y6TXFGqgDvGdE1cpT6PKf2Ym99m6yTi', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:24', '2024-12-30 15:39:24', '128340'),
(142, 'ayuga', '', 1, NULL, 'ayuga194876', 'ayuga194876@gmail.com', '$2y$12$g0v4owNvu.MSn/4LbA1UU.3WOBWBb8qPWKNRqgNNNWK5X6RqtDOre', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:24', '2024-12-30 15:39:24', '194876'),
(143, 'muliati', '', 1, NULL, 'muliati086804', 'muliati086804@gmail.com', '$2y$12$x12b608vR5g8HM7z3ZrwYe9pO5OSYmpeANNGNrcam3IW7j0mmUuJ.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:25', '2024-12-30 15:39:25', '086804'),
(144, 'asrati', '', 1, NULL, 'asrati153916', 'asrati153916@gmail.com', '$2y$12$PUa40dVs6cI9EUMpGES9uOljPwNJ1Az929KAu3ejTMq3M4iuwhZ4.', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:25', '2024-12-30 15:39:25', '153916'),
(145, 'syafridah', '', 1, NULL, 'syafridah078194', 'syafridah078194@gmail.com', '$2y$12$tkk5qTF5wbmBf25vq9TSBeDgMW1.swzshv9qH7cri8NLA5fkEA.Ii', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:26', '2024-12-30 15:39:26', '078194'),
(146, 'abd', 'rasyid ali', 0, NULL, 'abd189875', 'abd189875@gmail.com', '$2y$12$eVKwYnTweXExXzkTeEF4BuZ7QQb7NhVFkiz6DAAIHQG3KeRCl6oLO', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:26', '2024-12-30 15:39:26', '189875'),
(147, 'sulasmi', '', 1, NULL, 'sulasmi138530', 'sulasmi138530@gmail.com', '$2y$12$8Sp8gYAnyZEGKreMGJKvCeIvMWlMVdSRp0FAj4CzcjfeRh0zzXwrq', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 15:39:27', '2024-12-30 15:39:27', '138530');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_user_id_foreign` (`user_id`);

--
-- Indexes for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosis_symptoms_diagnose_id_foreign` (`diagnose_id`),
  ADD KEY `diagnosis_symptoms_symptom_id_foreign` (`symptom_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diseases_slug_unique` (`slug`);

--
-- Indexes for table `disease_symptoms`
--
ALTER TABLE `disease_symptoms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disease_symptoms_disease_id_foreign` (`disease_id`),
  ADD KEY `disease_symptoms_symptom_id_foreign` (`symptom_id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendations_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `symptoms_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_rm_unique` (`rm`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logins_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `disease_symptoms`
--
ALTER TABLE `disease_symptoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notification_logs`
--
ALTER TABLE `notification_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD CONSTRAINT `admin_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  ADD CONSTRAINT `diagnosis_symptoms_diagnose_id_foreign` FOREIGN KEY (`diagnose_id`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosis_symptoms_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disease_symptoms`
--
ALTER TABLE `disease_symptoms`
  ADD CONSTRAINT `disease_symptoms_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disease_symptoms_symptom_id_foreign` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_logs`
--
ALTER TABLE `notification_logs`
  ADD CONSTRAINT `notification_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD CONSTRAINT `user_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
