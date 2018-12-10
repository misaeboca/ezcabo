-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 10:20 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_divine_home_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquire`
--

CREATE TABLE `enquire` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquire`
--

INSERT INTO `enquire` (`id`, `property_id`, `agent_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 4, 1, 'John Doe', 'johndeo@gmail.com', '1234567891', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(2, 11, 3, 'Jane Doe', 'jane@gamil.com', '9986525412', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_10_065428_create_settings_table', 1),
('2015_12_25_133843_create_enquire_table', 1),
('2015_12_25_134328_create_partners_table', 1),
('2015_12_25_134629_create_properties_table', 1),
('2015_12_25_142242_create_slider_table', 1),
('2015_12_25_142436_create_subscriber_table', 1),
('2015_12_25_142619_create_testimonials_table', 1),
('2016_04_04_164203_create_cities_table', 1),
('2016_04_04_164227_create_property_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partner_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `url`, `partner_image`) VALUES
(1, 'Squareroom', '#', 'squareroom-8be2fb52b61cffd275c182409590a5de'),
(2, 'Bluehost', '#', 'bluehost-1e6d0ac3fa9b9d6ba685a41baf498c5b'),
(3, 'Square', '#', 'square-dcb2450728f965b31a3d5619772fe59a'),
(4, 'Erikaschesonis1', '#', 'erikaschesonis1-617150e2475e77fbc86477f26816ed62'),
(5, 'Cube', '#', 'cube-cfe98eef41393ad457fa78c8f26fd843'),
(6, 'Altria1', '#', 'altria1-e1a183cc2597e9832fb5f891651329ea'),
(7, 'National Geographic', '#', 'national-geographic-249e3571728581a15f66b178ffbbef72'),
(8, 'Modernart', '#', 'modernart-443d8f45d4ed7a6637c35c256e2a326e');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `featured_property` int(11) NOT NULL DEFAULT '0',
  `property_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `map_latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bathrooms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bedrooms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `garage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `land_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `build_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `property_features` text COLLATE utf8_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `floor_plan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_code` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `featured_property`, `property_name`, `property_slug`, `property_type`, `property_purpose`, `price`, `address`, `map_latitude`, `map_longitude`, `bathrooms`, `bedrooms`, `garage`, `land_area`, `build_area`, `description`, `property_features`, `featured_image`, `floor_plan`, `video_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Milano Apartments', 'milano-apartments', '2', 'Sale', '42,000', 'Durham Road, Fallston, MD, USA', '39.5768658', '-76.48383810000001', '2', '4', '1', '950', '800', 'Nam mattis lobortis felis eu blandit. Morbi tellus ligula, interdum sit amet ipsum et, viverra hendrerit lectus. Nunc efficitur sem vel est laoreet, sed bibendum eros viverra. Vestibulum finibus, ligula sed euismod tincidunt, lacus libero lobortis ligula, sit amet molestie ipsum purus ut tortor. Nunc varius, dui et sollicitudin facilisis, erat felis imperdiet felis, et iaculis dui magna vitae diam. Donec mattis diam nisl, quis ullamcorper enim malesuada non. Curabitur lobortis eu mauris nec vestibulum. Nam efficitur, ex ac semper malesuada, nisi odio consequat dui, hendrerit vulputate odio dui vitae massa. Aliquam tortor urna, tincidunt ut euismod quis, semper vel ipsum. Ut non vestibulum mauris. Morbi euismod, felis non hendrerit viverra, nunc sapien bibendum ligula, eget vehicula nunc dolor eu ex. Quisque in semper odio. Donec auctor blandit ligula. Integer id lectus non nibh vulputate efficitur quis at arcu.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Internet,Swimming Pool,Central Heating,Laundry Room,Alarm', 'divine-apartments-1001d59c2b2ce9dbc0c5cd2f895caa37', 'divine-apartments-30a2799bb38d24cda99fb19cf156fd61', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-06 03:12:50', '2018-02-09 02:02:35'),
(2, 1, 1, 'Eagle Apartments', 'eagle-apartments', '2', 'Rent', '1,000', '9364 School Lane, Lynchburg, VA, USA', '37.3810765', '-79.13859579999996', '2', '3', NULL, '550', '550', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Gym,Front yard,Pool,Roof Deck,Balcony Gym,Balcony,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'eagle-apartments-5468b368b1b5adcbfc133ee8ee94bfa1', 'eagle-apartments-bb91b5e0c0d06915055e3f03d6bc3816', '', 1, '2018-02-08 23:25:53', '2018-02-08 23:25:53'),
(3, 1, 0, 'Beach Life', 'beach-life', '1', 'Sale', '30,000', '778 Country Place, Panama City, FL, USA', '30.2479664', '-82.71012559999997', '3', '4', '1', '890', '850', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'beach-life-3f6ebf8aef0f352720bc0cb534d878b6', 'beach-life-ac4c0c5d6b6b20ce69643ff104689db0', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&amp;showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-08 23:43:21', '2018-02-09 00:00:48'),
(4, 1, 0, 'Land In Central Park', 'land-in-central-park', '4', 'Sale', '50,000', '1125 Park Avenue, NY, New York, USA', '40.7828992', '-73.9547397', '4', '+5', NULL, '560', '500', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'land-in-central-park-a5cd2dac42b971461f578a643a762809', 'land-in-central-park-f987a6070b87952d5216f4c9dd1d76b2', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 00:06:01', '2018-02-09 02:45:18'),
(5, 1, 0, 'The Urban Life', 'the-urban-life', '4', 'Rent', '1,250', '45 Denver, Fountain, CO, USA', '38.6730273', '-104.70352359999998', '2', '3', '1', '650', '500', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\\\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\\\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room', 'the-urban-life-eb0f08c416d76724e4d5530f736c09f4', NULL, '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&amp;showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 00:09:55', '2018-02-09 00:09:55'),
(6, 2, 1, 'Divine Villas', 'divine-villas', '5', 'Sale', '100,000', 'The Paseo, Kansas City, MO, USA', '39.0433695', '-94.56805939999998', '+5', '+5', NULL, '990', '850', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'divine-villas-1e90713e6a67baa11baa29e7aba291a5', 'divine-villas-ba8ad81d576f0dc2f54732c1d37e09f3', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&amp;showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 00:49:01', '2018-02-09 00:49:01'),
(7, 2, 0, 'Tulip Violet Apartment', 'tulip-violet-apartment', '2', 'Sale', '50,000', '422 Dallas Parkway, Prosper, TX, USA', '33.2254488', '-96.81927359999997', '3', '4', NULL, '450', '390', 'While Tulip Violet Gurgaon takes you away from the noise and congestion of the city, it is still close enough for you to avail the many benefits offered by it, Your home is only a short distance away from the happening places and road and rail connections. So that you and your family are never far away from life.\r\n\r\nTulip Violet Gurgaon has redefined the concept of relaxed and stylish living. Read, Stare, discuss, listen, imagine, Relish your precious and private moments. Walk. Jog. Run. Sit. Stretch out your body. Savour delectable cuisine or throw a bash for friends and colleagues. Tickle your taste buds. Live life bigger than your imagination.', 'Gym,Front yard,Pool,Roof Deck,Balcony Gym,Balcony ,Car Parking,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'tulip-violet-apartment-4e55139e019a58e0084f194f758ffdea', 'tulip-violet-apartment-d12d5b4f8795483907457f1f7aabffcb', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 01:21:10', '2018-02-09 01:21:10'),
(8, 2, 0, 'Mahagun My Woods', 'mahagun-my-woods', '7', 'Rent', '1,500', 'Fort Collins, Colorado 80523, USA', '40.5702905', '-105.09016250000002', '2', '4', '1', '780', '650', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'mahagun-my-woods-d13f6aa1117f0a36d3478a998f9925b7', 'mahagun-my-woods-8f5357b3cb6f50a7d839fc05fa77347e', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 01:30:37', '2018-02-09 01:30:37'),
(9, 2, 0, 'Celebrity Serenity', 'celebrity-serenity', '4', 'Sale', '60,000', '56 Las Vegas Expressway, Las Vegas, NV, USA', '36.1042555', '-115.22388419999999', '2', '4', '2', '780', '690', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'celebrity-serenity-dbb422937d7ff56e049d61da730b3e11', 'celebrity-serenity-aafb1ce4fed408a5843cf431a0bbdcb1', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 01:35:43', '2018-02-09 01:35:43'),
(10, 3, 0, 'Imperia Mirage', 'imperia-mirage', '2', 'Rent', '30,000', '89 Oklahoma City Boulevard, Oklahoma City, OK, USA', '35.4653916', '-97.5325077', '2', '4', NULL, '550', '500', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'imperia-mirage-88a0f49bc167de71dbe981b10dd26271', 'imperia-mirage-2e5996f9dfd1f117c1b60a9c57e6ced9', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 0, '2018-02-09 01:54:59', '2018-02-09 01:54:59'),
(11, 3, 0, 'Fortune Villa', 'fortune-villa', '5', 'Sale', '120,000', 'Fortune Villa Drive, Clinton, IN, USA', '39.67585500000001', '-87.41085099999998', '+5', '+5', '3', '890', '750', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\'Content here, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Gym,Front yard,Pool,Roof Deck,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'fortune-villa-018dd1e07a2de4a08e6612341bf2323e', 'fortune-villa-14b7500e057096627b43790de867406b', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 02:33:46', '2018-02-09 02:34:24'),
(12, 3, 0, 'Hill View Homes', 'hill-view-homes', '7', 'Sale', '55,000', 'Albuquerque, NM, USA', '35.0853336', '-106.60555340000002', '3', '4', '1', '980', '900', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Gym,Front yard,Pool,Roof Deck,Balcony Gym,Balcony ,Air Conditioning,Swimming Pool,Central Heating,Laundry Room,Alarm', 'hill-view-homes-908b9c4c6b4ddb779aa73654b03acfed', 'hill-view-homes-ab8d69582f285942fdd5ccd29a678476', '<iframe width=\\\"560\\\" height=\\\"315\\\" src=\\\"https://www.youtube.com/embed/nmswM1EH1_s?rel=0&showinfo=0\\\" frameborder=\\\"0\\\" allow=\\\"autoplay; encrypted-media\\\" allowfullscreen></iframe>', 1, '2018-02-09 02:52:29', '2018-02-09 02:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `property_gallery`
--

CREATE TABLE `property_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property_gallery`
--

INSERT INTO `property_gallery` (`id`, `property_id`, `image_name`) VALUES
(13, 1, 'divine-apartments_4613-b.jpg'),
(12, 1, 'divine-apartments_9120-b.jpg'),
(14, 1, 'divine-apartments_3753-b.jpg'),
(15, 1, 'divine-apartments_5771-b.jpg'),
(16, 1, 'divine-apartments_8659-b.jpg'),
(17, 2, 'eagle-apartments_2262-b.jpg'),
(18, 2, 'eagle-apartments_2290-b.jpg'),
(19, 2, 'eagle-apartments_1061-b.jpg'),
(20, 3, 'beach-life_9447-b.jpg'),
(21, 3, 'beach-life_7998-b.jpg'),
(22, 3, 'beach-life_5920-b.jpg'),
(23, 3, 'beach-life_7748-b.jpg'),
(24, 4, 'land-in-central-park_6372-b.jpg'),
(25, 4, 'land-in-central-park_8777-b.jpg'),
(26, 4, 'land-in-central-park_7417-b.jpg'),
(27, 4, 'land-in-central-park_2453-b.jpg'),
(28, 5, 'the-urban-life_4493-b.jpg'),
(29, 5, 'the-urban-life_3972-b.jpg'),
(30, 5, 'the-urban-life_6132-b.jpg'),
(31, 5, 'the-urban-life_9970-b.jpg'),
(32, 6, 'divine-villas_1872-b.jpg'),
(33, 6, 'divine-villas_6139-b.jpg'),
(34, 6, 'divine-villas_4169-b.jpg'),
(35, 7, 'tulip-violet-apartment_490-b.jpg'),
(36, 7, 'tulip-violet-apartment_5084-b.jpg'),
(37, 7, 'tulip-violet-apartment_4761-b.jpg'),
(38, 8, 'mahagun-my-woods_4023-b.jpg'),
(39, 8, 'mahagun-my-woods_4916-b.jpg'),
(40, 8, 'mahagun-my-woods_7210-b.jpg'),
(41, 8, 'mahagun-my-woods_4823-b.jpg'),
(42, 9, 'celebrity-serenity_6401-b.jpg'),
(43, 9, 'celebrity-serenity_6819-b.jpg'),
(44, 9, 'celebrity-serenity_7958-b.jpg'),
(45, 9, 'celebrity-serenity_5097-b.jpg'),
(46, 10, 'imperia-mirage_9773-b.jpg'),
(47, 10, 'imperia-mirage_7782-b.jpg'),
(48, 10, 'imperia-mirage_8108-b.jpg'),
(49, 1, 'divine-apartments_9131-b.jpg'),
(50, 1, 'divine-apartments_3858-b.jpg'),
(51, 11, 'fortune-villa_7140-b.jpg'),
(52, 11, 'fortune-villa_8181-b.jpg'),
(53, 11, 'fortune-villa_8859-b.jpg'),
(54, 12, 'hill-view-homes_7777-b.jpg'),
(55, 12, 'hill-view-homes_8748-b.jpg'),
(56, 12, 'hill-view-homes_441-b.jpg'),
(57, 12, 'hill-view-homes_6851-b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `types` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `types`, `slug`) VALUES
(1, 'Land', 'land'),
(2, 'Apartment', 'apartment'),
(3, 'Builder Floor	Actions ', 'builder-flooractions'),
(4, 'Commercial', 'commercial'),
(5, 'House Villa', 'house-villa'),
(7, 'Individual House', 'individual-house');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_map_key` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recaptcha` int(1) NOT NULL DEFAULT '0',
  `site_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_keywords` text COLLATE utf8_unicode_ci,
  `site_header_code` text COLLATE utf8_unicode_ci,
  `site_footer_code` text COLLATE utf8_unicode_ci,
  `site_copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_widget1_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_widget1` text COLLATE utf8_unicode_ci,
  `footer_widget2_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_widget2` text COLLATE utf8_unicode_ci,
  `footer_widget3_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_widget3` text COLLATE utf8_unicode_ci,
  `title_bg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `all_properties_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map_longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_properties_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_properties_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_properties_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rent_properties_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagination_limit` int(3) NOT NULL DEFAULT '12',
  `addthis_share_code` text COLLATE utf8_unicode_ci,
  `disqus_comment_code` text COLLATE utf8_unicode_ci,
  `social_facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_gplus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_us_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_us_description` text COLLATE utf8_unicode_ci,
  `contact_lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_us_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_conditions_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_conditions_description` text COLLATE utf8_unicode_ci,
  `privacy_policy_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy_policy_description` text COLLATE utf8_unicode_ci,
  `currency_sign` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_property_price` float(11,2) DEFAULT NULL,
  `bank_payment_details` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_email`, `site_logo`, `site_favicon`, `google_map_key`, `recaptcha`, `site_description`, `site_keywords`, `site_header_code`, `site_footer_code`, `site_copyright`, `footer_widget1_title`, `footer_widget1`, `footer_widget2_title`, `footer_widget2`, `footer_widget3_title`, `footer_widget3`, `title_bg`, `all_properties_layout`, `map_latitude`, `map_longitude`, `home_properties_layout`, `featured_properties_layout`, `sale_properties_layout`, `rent_properties_layout`, `pagination_limit`, `addthis_share_code`, `disqus_comment_code`, `social_facebook`, `social_twitter`, `social_linkedin`, `social_gplus`, `about_us_title`, `about_us_description`, `contact_lat`, `contact_long`, `contact_us_title`, `contact_us_email`, `contact_us_phone`, `contact_us_address`, `terms_conditions_title`, `terms_conditions_description`, `privacy_policy_title`, `privacy_policy_description`, `currency_sign`, `stripe_currency`, `featured_property_price`, `bank_payment_details`) VALUES
(1, 'Divine Home - Real Estate Pro', 'scriptscode7@gmail.com', 'logo.png', 'favicon.png', 'AIzaSyC3m_TyDp94bKpyOxWzojZgcUXYj8DdbBc', 1, 'Easy Real Estates provide you with a quick and easy way to create a real estates site portal.', NULL, '', '', 'Copyright © 2018 Divine Home - Real Estate Pro. All rights reserved.', 'About Us', 'Vel fermentum ipsum. Suspendisse quis molestie odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque aliquet a metus in aliquet. Praesent ut turpis posuere, commodo odio id, ornare tortor', 'Follow Us', '<img src=\\\"http://scriptscode7.com/follow.jpg\\\" width=\\\"325\\\"/>', 'Get In Touch', '<ul class=\\\"contact-info\\\">\r\n            <li><i class=\\\"fa fa-map-marker\\\"></i>Real estate script.\r\n9.5 Main Street, CA,USA</li>\r\n            <li class=\\\"phone\\\"><i class=\\\"fa fa-phone\\\"></i>+62-3456-78910</li>\r\n            <li><i class=\\\"fa fa-envelope\\\"></i>info@domain.com</li>\r\n </ul>', 'title_bg.jpg', 'grid', '37.090240', '-95.712891', 'map', 'rows', 'grid_side', 'rows', 9, '<!-- Go to www.addthis.com/dashboard to customize your tools -->\r\n<script type=\"text/javascript\" src=\"//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5942c509e2db8e32\"></script>\r\n<!-- Go to www.addthis.com/dashboard to customize your tools -->\r\n<div class=\"addthis_inline_share_toolbox\"></div>', '<div id=\"disqus_thread\"></div>\r\n<script>\r\n\r\n/**\r\n*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.\r\n*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/\r\n/*\r\nvar disqus_config = function () {\r\nthis.page.url = PAGE_URL;  // Replace PAGE_URL with your page\'s canonical URL variable\r\nthis.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable\r\n};\r\n*/\r\n(function() { // DON\'T EDIT BELOW THIS LINE\r\nvar d = document, s = d.createElement(\'script\');\r\ns.src = \'https://divine-home-pro.disqus.com/embed.js\';\r\ns.setAttribute(\'data-timestamp\', +new Date());\r\n(d.head || d.body).appendChild(s);\r\n})();\r\n</script>\r\n<noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>\r\n<script id=\"dsq-count-scr\" src=\"//divine-home-pro.disqus.com/count.js\" async></script>', '#', '#', '#', '#', 'About Us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '38.493744', '-122.456286', 'Contact Us', 'scriptscode7@gmail.com', '+62-3456-78910', 'Real estate script. 9.5 Main Street, CA,USA', '', '', '', '', '$', 'USD', 9.99, '<div><span style=\"font-weight: bold;\">Bank payment details</span></div><div><br></div><div>ICICI: 38082 01288916</div><div>SWIFT: ICICINBBTSY</div><div><br></div><div>Featured property price: 10 USD</div><div><br></div>');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_text1`, `slider_text2`, `image_name`) VALUES
(1, 'Slider 1', 'Vacation Rental', 'in San Francisco', 'slider-1-909481380b44adce572e160b5019c2c9'),
(2, 'Slider 1', 'Luxury Apartment', 'in New York', 'slider-1-3393cfddb0e497749d7242a9c0269301'),
(3, 'Slider 3', 'Family House', 'in Miami', 'slider-3-e2377e7ba15750b6ff3819ff38f5909c');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `ip`) VALUES
(1, 'admin@gmail.com', '::1'),
(2, 'admin@gmail.com', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial` text COLLATE utf8_unicode_ci NOT NULL,
  `t_user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `testimonial`, `t_user_image`) VALUES
(1, 'John Doe', 'Lawyer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto dolor, earum eum illo nostrum possimus quae, quasi quod ratione recusandae repudiandae soluta vero? Dicta dolor est et exercitationem illo! Deleniti dolorem est facere neque pariatur, quaerat recusandae ut? Alias atque cum dicta hic ipsum laboriosam, modi numquam sed vero?', NULL),
(2, 'Chris Brown', 'Accountant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto dolor, earum eum illo nostrum possimus quae, quasi quod ratione recusandae repudiandae soluta vero? Dicta dolor est et exercitationem illo! Deleniti dolorem est facere neque pariatur, quaerat recusandae ut? Alias atque cum dicta hic ipsum laboriosam, modi numquam sed vero?', 'chris-brown-e2bbde3cdeefda0f0e0bd6ae4c97097a'),
(3, 'Harry Cool', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto dolor, earum eum illo nostrum possimus quae, quasi quod ratione recusandae repudiandae soluta vero? Dicta dolor est et exercitationem illo! Deleniti dolorem est facere neque pariatur, quaerat recusandae ut? Alias atque cum dicta hic ipsum laboriosam, modi numquam sed vero?', 'harry-cool-13c83dba3768d920cbc98f40760bb970'),
(4, 'Jane Doe', 'Nurse', 'Phasellus quis lectus metus, at posuere neque. Sed pharetra nibh eget orci convallis at posuere leo convallis', 'jane-doe-005796431d2c992f5627c7d7952864e6'),
(5, 'Cen Lung', 'Accountant', 'Vivamus sit amet libero turpis, non venenatis urna. In blandit, odio convallis suscipit venenatis, ante ipsum cursus augue.Vivamus sit amet libero turpis, non venenatis urna. In blandit, odio convallis suscipit venenatis, ante ipsum cursus augue.', 'cen-lung-ae4a43eeb84c709f3fe69496fcaff5a7');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gateway` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `property_id`, `user_id`, `email`, `gateway`, `payment_amount`, `payment_id`, `date`) VALUES
(3, 1, 3, 'user@gmail.com', 'Stripe', '10', 'ch_1BtAaiFxn1dAqXCu0PP2Y7Lm', 1518048000),
(5, 6, 3, 'agent@gmail.com', 'Stripe', '10', 'ch_1BtAjYFxn1dAqXCuMCSy9eFV', 1518048000),
(6, 2, 1, 'scriptscode7@gmail.com', 'Stripe', '9.99', 'ch_1BtBa2Fxn1dAqXCuM9c8LbAz', 1518048000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usertype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `password`, `phone`, `about`, `facebook`, `twitter`, `gplus`, `linkedin`, `image_icon`, `status`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Divine Home', 'admin@gmail.com', '$2y$10$cJhcf3AdbTLjAzBg.hmgdOSlKL3hJw2qmCgTh9XdeGINQ1TmCJCsG', '+11234567891', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur doloremque eius expedita molestiae molestias pariatur quod repellendus ullam vel!', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com', 'http://linkedin.com', 'admin-03a974a1738246b96d15846d8e73c95b', 1, NULL, 'W0DlNDBgTvI18dKQq63CQIpEuuw2UslxjhhJWSt9BdxHxeqpAzTgsTQMZkb0', '2016-10-11 12:42:11', '2018-02-08 23:29:55'),
(2, 'Agents', 'Janie Doe', 'janie@gmail.com', '$2y$10$BtMJGS0QrPGh9NN81Wsjgut0auPgSC/E6jG0.SrB2tTfnK9hfNL0q', '1234567891', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur doloremque eius expedita molestiae molestias pariatur quod repellendus ullam vel!', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com', 'http://linkedin.com', 'janie-doe-3215da076745bf32d9bfd0003ab16392', 1, 'CW3ISg21SgxOPZ6', 'vAhUlVeifoTNSXnp5LgNCG5AEBqvV0i9ojnU7nVT001nt3Fx7uDEsfk5MENj', '2018-01-17 02:30:06', '2018-02-09 04:11:58'),
(3, 'User', 'Jane Doe', 'user@gmail.com', '$2y$10$BtMJGS0QrPGh9NN81Wsjgut0auPgSC/E6jG0.SrB2tTfnK9hfNL0q', '1234567891', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur doloremque eius expedita molestiae molestias pariatur quod repellendus ullam vel!', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com', 'http://linkedin.com', 'john-doe-4e9fda91550726d8a068d76a122ae8a3', 1, 'CW3ISg21SgxOPZ6', 'vAhUlVeifoTNSXnp5LgNCG5AEBqvV0i9ojnU7nVT001nt3Fx7uDEsfk5MENj', '2018-01-17 02:30:06', '2018-02-09 00:20:37'),
(4, 'Agents', 'Richard Roe', 'richard@gmail.com', '$2y$10$aFFMEGO5Snr8STJe6SkukO4S.sRjmc6O89PXBjNqbPzs4OE.TS8Ci', '1223598410', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur doloremque eius expedita molestiae molestias pariatur quod repellendus ullam vel!There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com', 'http://linkedin.com', 'richard-roe-ba8313030bec613a4e95e81d4146d249', 1, '', NULL, '2018-02-09 03:48:33', '2018-02-09 04:15:27'),
(5, 'Agents', 'John Doe', 'agent@gmail.com', '$2y$10$ki1IkGLN4mWZ/w14u7H1ruGVE6d6VpKwjQm0cvrnIIt0zABl3/mie', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ea eos expedita fuga illo quaerat quod sit sunt. Aliquid doloribus est facilis ipsam iusto laborum magnam necessitatibus nulla vel voluptatem. \r\nAb autem eaque, eos esse mollitia neque non nulla obcaecati odio porro reiciendis rem voluptates? Beatae corporis debitis distinctio doloribus dolorum eaque esse in iure iusto. \r\nmaiores nisi nostrum optio quidem ratione repudiandae tempora ut vero voluptatum.', 'http://facebook.com', 'http://twitter.com', 'http://gplus.com', 'http://linkedin.com', 'john-doe-c39f765d0e96780b4f7b77ed602c3a1b', 1, 'NEudKM4AAzYwEdl', 'BHz78nXvakdjWPtyBtlZmor5VLkJphMgj3ljzBJwJLd18hOPKrx8pZsAqAu1', '2017-09-15 14:07:09', '2018-02-09 01:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquire`
--
ALTER TABLE `enquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_gallery`
--
ALTER TABLE `property_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquire`
--
ALTER TABLE `enquire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `property_gallery`
--
ALTER TABLE `property_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
