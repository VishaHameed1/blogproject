-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2026 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('blog-project-cache-categories:with_count', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:7:{i:0;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:5;s:4:\"name\";s:13:\"Career Advice\";s:4:\"slug\";s:13:\"career-advice\";s:11:\"description\";s:232:\"To build a strong career, focus on matching your core skills with your daily interests, keep learning new abilities, and use platforms like Career Guidance Pakistan or Coursera Career Advice for local path planning and skill growth.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Kh1usGEinNkOsXPYPrnY4gfW3Er4Y4tFwWUJn87S.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:36:47\";s:11:\"posts_count\";i:6;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:5;s:4:\"name\";s:13:\"Career Advice\";s:4:\"slug\";s:13:\"career-advice\";s:11:\"description\";s:232:\"To build a strong career, focus on matching your core skills with your daily interests, keep learning new abilities, and use platforms like Career Guidance Pakistan or Coursera Career Advice for local path planning and skill growth.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Kh1usGEinNkOsXPYPrnY4gfW3Er4Y4tFwWUJn87S.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:36:47\";s:11:\"posts_count\";i:6;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:7;s:4:\"name\";s:14:\"Cyber Security\";s:4:\"slug\";s:14:\"cyber-security\";s:11:\"description\";s:144:\"Cyber security is the practice of protecting systems, networks, programs, devices, and data from digital attacks, theft, or unauthorized access.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Kw4hsL01SoGFEygNWjci0huUKst2IZ6NYBfWtF2F.jpg\";s:10:\"created_at\";s:19:\"2026-08-20 08:06:01\";s:10:\"updated_at\";s:19:\"2026-08-21 07:38:42\";s:11:\"posts_count\";i:2;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:7;s:4:\"name\";s:14:\"Cyber Security\";s:4:\"slug\";s:14:\"cyber-security\";s:11:\"description\";s:144:\"Cyber security is the practice of protecting systems, networks, programs, devices, and data from digital attacks, theft, or unauthorized access.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Kw4hsL01SoGFEygNWjci0huUKst2IZ6NYBfWtF2F.jpg\";s:10:\"created_at\";s:19:\"2026-08-20 08:06:01\";s:10:\"updated_at\";s:19:\"2026-08-21 07:38:42\";s:11:\"posts_count\";i:2;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:4;s:4:\"name\";s:11:\"Design & UX\";s:4:\"slug\";s:9:\"design-ux\";s:11:\"description\";s:237:\"Design and User Experience (UX) is the practice of building digital products that feel simple, clear, and useful. UX focuses on how a system works and how the user feels, while User Interface (UI) design handles the visual look and feel.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Cma5HPmxYQ7z1LAcrfW25fjOx8P4OQ50oimLuwue.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:39:24\";s:11:\"posts_count\";i:6;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:4;s:4:\"name\";s:11:\"Design & UX\";s:4:\"slug\";s:9:\"design-ux\";s:11:\"description\";s:237:\"Design and User Experience (UX) is the practice of building digital products that feel simple, clear, and useful. UX focuses on how a system works and how the user feels, while User Interface (UI) design handles the visual look and feel.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/Cma5HPmxYQ7z1LAcrfW25fjOx8P4OQ50oimLuwue.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:39:24\";s:11:\"posts_count\";i:6;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:3;s:4:\"name\";s:19:\"DevOps & Deployment\";s:4:\"slug\";s:17:\"devops-deployment\";s:11:\"description\";s:190:\"DevOps deployment automates software delivery from code commit to production. It uses CI/CD pipelines to build, test, and release code safely, reducing manual errors and speeding up updates.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/DWjYDPdrvzVJjlW2blcM3EBZxLZEsHA6fhxMlSdq.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:57:15\";s:11:\"posts_count\";i:4;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:3;s:4:\"name\";s:19:\"DevOps & Deployment\";s:4:\"slug\";s:17:\"devops-deployment\";s:11:\"description\";s:190:\"DevOps deployment automates software delivery from code commit to production. It uses CI/CD pipelines to build, test, and release code safely, reducing manual errors and speeding up updates.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/DWjYDPdrvzVJjlW2blcM3EBZxLZEsHA6fhxMlSdq.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-21 07:57:15\";s:11:\"posts_count\";i:4;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:2;s:4:\"name\";s:12:\"Laravel Tips\";s:4:\"slug\";s:12:\"laravel-tips\";s:11:\"description\";s:180:\"Laravel tips describe practical shortcuts, performance tweaks, and best practices to write cleaner and faster PHP code using the Laravel Daily Tips collection and community guides.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/wZPBxerxi5luMDExSA4Mi0RMXjpC6dPeIvx7PJgH.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-30 11:17:56\";s:11:\"posts_count\";i:5;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:2;s:4:\"name\";s:12:\"Laravel Tips\";s:4:\"slug\";s:12:\"laravel-tips\";s:11:\"description\";s:180:\"Laravel tips describe practical shortcuts, performance tweaks, and best practices to write cleaner and faster PHP code using the Laravel Daily Tips collection and community guides.\";s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/wZPBxerxi5luMDExSA4Mi0RMXjpC6dPeIvx7PJgH.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-30 11:17:56\";s:11:\"posts_count\";i:5;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:6;s:4:\"name\";s:11:\"Open Source\";s:4:\"slug\";s:11:\"open-source\";s:11:\"description\";N;s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/BIQO6tkC9gvuXt4xwCOCk6QuZ6HxjZ9i005lYgJP.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-23 16:38:51\";s:11:\"posts_count\";i:5;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:6;s:4:\"name\";s:11:\"Open Source\";s:4:\"slug\";s:11:\"open-source\";s:11:\"description\";N;s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/BIQO6tkC9gvuXt4xwCOCk6QuZ6HxjZ9i005lYgJP.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-23 16:38:51\";s:11:\"posts_count\";i:5;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:19:\"App\\Models\\Category\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:1;s:4:\"name\";s:15:\"Web Development\";s:4:\"slug\";s:15:\"web-development\";s:11:\"description\";N;s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/2RtDOIuag1sZzi7wsw4pJ8n3ZCandry9kKtqQ4bi.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-23 16:39:05\";s:11:\"posts_count\";i:5;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:1;s:4:\"name\";s:15:\"Web Development\";s:4:\"slug\";s:15:\"web-development\";s:11:\"description\";N;s:4:\"icon\";s:4:\"📂\";s:5:\"image\";s:55:\"categories/2RtDOIuag1sZzi7wsw4pJ8n3ZCandry9kKtqQ4bi.jpg\";s:10:\"created_at\";s:19:\"2026-08-19 08:23:14\";s:10:\"updated_at\";s:19:\"2026-08-23 16:39:05\";s:11:\"posts_count\";i:5;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:10:\"created_at\";s:8:\"datetime\";s:10:\"updated_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:4:\"icon\";i:4;s:5:\"image\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1788421469);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT '?',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-development', NULL, '📂', 'categories/2RtDOIuag1sZzi7wsw4pJ8n3ZCandry9kKtqQ4bi.jpg', '2026-08-19 03:23:14', '2026-08-23 11:39:05'),
(2, 'Laravel Tips', 'laravel-tips', 'Laravel tips describe practical shortcuts, performance tweaks, and best practices to write cleaner and faster PHP code using the Laravel Daily Tips collection and community guides.', '📂', 'categories/wZPBxerxi5luMDExSA4Mi0RMXjpC6dPeIvx7PJgH.jpg', '2026-08-19 03:23:14', '2026-08-30 06:17:56'),
(3, 'DevOps & Deployment', 'devops-deployment', 'DevOps deployment automates software delivery from code commit to production. It uses CI/CD pipelines to build, test, and release code safely, reducing manual errors and speeding up updates.', '📂', 'categories/DWjYDPdrvzVJjlW2blcM3EBZxLZEsHA6fhxMlSdq.jpg', '2026-08-19 03:23:14', '2026-08-21 02:57:15'),
(4, 'Design & UX', 'design-ux', 'Design and User Experience (UX) is the practice of building digital products that feel simple, clear, and useful. UX focuses on how a system works and how the user feels, while User Interface (UI) design handles the visual look and feel.', '📂', 'categories/Cma5HPmxYQ7z1LAcrfW25fjOx8P4OQ50oimLuwue.jpg', '2026-08-19 03:23:14', '2026-08-21 02:39:24'),
(5, 'Career Advice', 'career-advice', 'To build a strong career, focus on matching your core skills with your daily interests, keep learning new abilities, and use platforms like Career Guidance Pakistan or Coursera Career Advice for local path planning and skill growth.', '📂', 'categories/Kh1usGEinNkOsXPYPrnY4gfW3Er4Y4tFwWUJn87S.jpg', '2026-08-19 03:23:14', '2026-08-21 02:36:47'),
(6, 'Open Source', 'open-source', NULL, '📂', 'categories/BIQO6tkC9gvuXt4xwCOCk6QuZ6HxjZ9i005lYgJP.jpg', '2026-08-19 03:23:14', '2026-08-23 11:38:51'),
(7, 'Cyber Security', 'cyber-security', 'Cyber security is the practice of protecting systems, networks, programs, devices, and data from digital attacks, theft, or unauthorized access.', '📂', 'categories/Kw4hsL01SoGFEygNWjci0huUKst2IZ6NYBfWtF2F.jpg', '2026-08-20 03:06:01', '2026-08-21 02:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"14c5a551-e67f-4c89-a475-5c6c5a2ca984\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:27:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:13;i:14;i:14;i:15;i:15;i:16;i:17;i:18;i:18;i:19;i:19;i:20;i:20;i:21;i:21;i:22;i:22;i:23;i:23;i:24;i:24;i:25;i:25;i:26;i:26;i:27;i:28;i:29;i:29;i:30;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787135413, 1787135413),
(2, 'default', '{\"uuid\":\"2129582e-e9ef-4bbe-a9c4-2051cbd02090\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"command\":\"O:35:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:22;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";s:44:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveableScoutCollection\\\";}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787202872, 1787202872),
(3, 'default', '{\"uuid\":\"95dcf1a6-bd3b-48bb-9c13-18b82b94ae12\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"command\":\"O:35:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:23;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";s:44:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveableScoutCollection\\\";}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787202873, 1787202873),
(4, 'default', '{\"uuid\":\"a5a13830-1965-4e94-bb3c-de3b2dad8859\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"command\":\"O:35:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";s:44:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveableScoutCollection\\\";}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787203038, 1787203038),
(5, 'default', '{\"uuid\":\"5d7a3637-cb40-4cea-a2dd-f4cb765c39cd\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787203045, 1787203045),
(6, 'default', '{\"uuid\":\"01d696e5-1b9d-41ed-80be-ac7df836c9dc\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\",\"command\":\"O:33:\\\"Laravel\\\\Scout\\\\Jobs\\\\MakeSearchable\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787203139, 1787203139),
(7, 'default', '{\"uuid\":\"84e5dd20-73f7-4cac-a9b0-df0e41c88a99\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"command\":\"O:35:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";s:44:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveableScoutCollection\\\";}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787203323, 1787203323),
(8, 'default', '{\"uuid\":\"80470252-0acc-4231-a5b8-cd424f06d3d5\",\"displayName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":true,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\",\"command\":\"O:35:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveFromSearch\\\":2:{s:6:\\\"models\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\Post\\\";s:2:\\\"id\\\";a:1:{i:0;i:31;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";s:44:\\\"Laravel\\\\Scout\\\\Jobs\\\\RemoveableScoutCollection\\\";}s:10:\\\"connection\\\";s:8:\\\"database\\\";}\"}}', 0, NULL, 1787203328, 1787203328);

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
(4, '2026_08_19_074952_create_categories_table', 1),
(5, '2026_08_19_074954_create_posts_table', 1),
(6, '2026_08_19_081435_create_permission_tables', 1),
(7, '2026_08_20_065727_add_featured_image_to_posts_table', 2),
(8, '2026_08_20_072528_add_is_published_to_posts_table', 3),
(9, '2026_08_20_080447_add_description_and_icon_to_categories_table', 4),
(10, '2026_08_20_082223_add_role_id_to_users_table', 5),
(11, '2026_08_20_082319_add_role_id_to_users_table', 5),
(12, '2026_08_20_083421_add_slug_to_roles_table', 6),
(13, '2026_08_20_083451_add_missing_columns_to_roles_table', 7),
(14, '2026_08_21_071952_add_image_to_categories_table', 8),
(15, '2026_08_25_045327_add_status_and_rejection_reason_to_posts_table', 9),
(16, '2026_08_25_051031_add_role_to_users_table', 10),
(17, '2026_08_25_053118_add_user_id_to_posts_table', 11),
(18, '2026_08_25_073900_create_post_user_bookmark_table', 12),
(19, '2026_08_25_073902_create_post_user_history_table', 12),
(20, '2026_08_27_111551_add_avatar_and_bio_to_users_table', 13),
(21, '2026_09_01_043553_create_subscribers_table', 14),
(22, '2026_09_02_093808_add_viewed_at_to_post_user_history_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('vishahameed666@gmail.com', '$2y$12$mTmp7JunvxaVQCf7yIBVzuJtDprXsyVjZjRaPgqyP0Phw4suVqwtS', '2026-09-01 03:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` enum('draft','pending','published','rejected') NOT NULL DEFAULT 'draft',
  `rejection_reason` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `body`, `status`, `rejection_reason`, `featured_image`, `published_at`, `is_published`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 'Cupiditate eligendi odit et alias nemo accusamus', 'cupiditate-eligendi-odit-et-alias-nemo-accusamus', 'Est voluptatem necessitatibus explicabo vero praesentium. Voluptas cumque culpa labore corrupti dolorum mollitia qui. Voluptatem qui eum sed ut non quibusdam neque.\r\n\r\nSaepe dicta ut sapiente aut et et velit. Omnis saepe sed eaque officiis dolor. Aliquam excepturi quis voluptatem in. Nobis ut eum qui velit autem sed incidunt. Tenetur et perferendis exercitationem occaecati et.\r\n\r\nRepudiandae ab harum consequatur alias eveniet. Rerum qui qui repellat quod. Architecto aspernatur natus aliquam autem debitis odio.\r\n\r\nAtque ratione porro repudiandae est deserunt cum nihil. Adipisci ut sint sit possimus recusandae ad sit. Dolorum vitae est quaerat aut eaque repellendus cumque. Atque quia qui nisi accusamus atque. Numquam molestiae et in quis sit qui quos.\r\n\r\nEt vel aut sit unde. Ut iure esse velit omnis id.\r\n\r\nQui qui voluptates et quas enim aut. Labore tenetur voluptatum aut in illo.', 'published', NULL, 'posts/WlrWhe71KQQlbrOOPnbbo8oRx6dl2WZCXOj4IeD2.jpg', '2026-03-04 08:25:09', 1, '2026-08-19 03:23:14', '2026-08-23 11:24:05', NULL),
(2, 1, 'Dolor inventore expedita aperiam nam quia officia autem', 'dolor-inventore-expedita-aperiam-nam-quia-officia-autem', 'Deleniti ea adipisci aperiam consequatur et fugiat consequatur. Dolorem suscipit sequi itaque quia quis incidunt nostrum rerum. Dolor et nihil id perferendis neque. Aut ut sint veniam illum.\r\n\r\nPorro adipisci dicta debitis natus rem. Omnis facere omnis quasi vero aut. Laborum qui alias deserunt fugiat praesentium sit et qui. Magni voluptates quae dolores est.\r\n\r\nEst facere repudiandae enim nam eos. Saepe quos fuga est magnam beatae. Officia dolorem dolorem consequuntur sequi.\r\n\r\nExpedita vel sint mollitia iste atque. Corrupti voluptas cum illum architecto ut. Inventore qui suscipit voluptates placeat enim nulla enim. Totam ipsam et eligendi ut vitae.\r\n\r\nDolore libero et quis et vitae. Alias ut in sunt quos rerum alias consequatur quisquam. Odio est et facilis asperiores qui aut eaque.\r\n\r\nSimilique ratione minima autem labore ipsa. Modi hic perspiciatis cupiditate excepturi. Facere aut quia labore doloremque.', 'published', NULL, 'posts/j4f25cPXJVS1AJNplZz6xmbA7lRnVZACe0aMUUKG.jpg', '2026-06-15 00:28:21', 1, '2026-08-19 03:23:14', '2026-08-23 11:24:32', NULL),
(3, 1, 'Ducimus eius excepturi officiis necessitatibus nesciunt sapiente qui', 'ducimus-eius-excepturi-officiis-necessitatibus-nesciunt-sapiente-qui', 'Voluptas nisi sint aliquam aut eveniet similique quo deleniti. Fugiat distinctio dolor libero laborum vel quod. Delectus iste tempora porro aspernatur dolorem. Et illum unde quia aliquam aspernatur vel ducimus.\r\n\r\nOptio labore at quo qui molestiae. Velit qui harum nesciunt modi itaque reprehenderit rem. Non quia ea libero nisi dicta rerum eos. Itaque ea ipsum ut doloremque repellendus fuga rerum.\r\n\r\nSed sit dolores et fugiat ipsa nihil error et. Perspiciatis quibusdam temporibus enim praesentium.\r\n\r\nVeniam maxime fugiat modi cupiditate exercitationem dignissimos. Eum error atque quod optio porro fuga id. Rerum sunt sit nemo rerum illum. Reiciendis exercitationem modi aliquam ut sint.\r\n\r\nEt ullam nostrum ut optio quo sint. Nemo qui cumque dolor sed voluptatum omnis omnis. Dolores aut odio nemo dolores. Odit non dolor voluptas cum esse et maiores laudantium.\r\n\r\nQuis nemo qui vel. Dignissimos est nihil iure debitis vero nihil. Sint odit aut rerum et. Accusantium non et adipisci aliquid commodi cumque.', 'published', NULL, 'posts/TxX3gG7GTjW9X033AoKN1H74a7qierNMXyZd1fnP.jpg', '2026-04-23 07:35:06', 1, '2026-08-19 03:23:14', '2026-08-23 11:25:05', NULL),
(4, 1, 'At ut voluptatem dolore voluptatem', 'at-ut-voluptatem-dolore-voluptatem', 'Dicta maiores qui ipsum temporibus non esse. Velit sapiente adipisci quia vel. Quis corporis pariatur illo illo qui corrupti veniam. Velit eum dolorem similique itaque nesciunt omnis non.\n\nSunt recusandae maxime fugit nihil doloribus voluptatem. Asperiores doloremque quia quis tempora aperiam inventore. Est nemo repudiandae nostrum voluptatibus consectetur voluptas.\n\nAutem voluptate neque temporibus maiores. Minus ut libero voluptas recusandae corrupti.\n\nReiciendis autem pariatur voluptates suscipit sed iusto enim. Facilis earum voluptates rerum nemo at ut. In architecto animi temporibus.\n\nMolestiae repellendus sequi id id voluptatem mollitia corrupti non. Non consequuntur quis et accusantium est amet et. Quod quasi qui veritatis provident at omnis id. Numquam exercitationem sed iste distinctio inventore enim qui.\n\nNon aut est et et. Culpa non ducimus qui illum dignissimos ut asperiores. Officia quaerat dolores ad beatae fugit sapiente non.', 'published', NULL, NULL, '2026-06-28 03:13:57', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(5, 1, 'Hic sed numquam atque ea reiciendis itaque', 'hic-sed-numquam-atque-ea-reiciendis-itaque', 'Eos molestiae officia excepturi vel. Omnis ipsum sint mollitia aut enim. Ea eligendi in excepturi atque consequatur earum. Enim eligendi hic qui quia veritatis possimus aliquam.\r\n\r\nAut at eum ipsam et qui. Saepe tempore vitae voluptatibus nam nulla. Ipsam deleniti ut blanditiis ullam nihil exercitationem sequi. Architecto in et impedit quo ipsam temporibus alias.\r\n\r\nOmnis libero corporis delectus omnis maxime. Est ut nesciunt neque nihil esse neque. Dolor voluptatem molestiae nam et adipisci dolor commodi.\r\n\r\nId quasi et autem vero quia hic ipsa. Impedit ratione sed placeat provident autem. Quis ea quis vel enim quisquam dicta.\r\n\r\nIllo et voluptas harum facere voluptatem nisi voluptas. Beatae reiciendis et nulla quis. Totam quis totam occaecati rerum et mollitia. Ullam harum enim similique et laudantium quibusdam officiis. Dolorem culpa repellendus molestiae inventore quod maxime.\r\n\r\nId vel perferendis qui dignissimos consectetur. Omnis consequatur laborum culpa fuga alias delectus dolor est. Dolorum aut voluptatem sit sed ut quia deserunt iusto. Et aut est consequatur aut.', 'published', NULL, 'posts/P7U2WbE56NZBQqYA0vSjBglPKDNPwO57NrDTH5qX.jpg', '2026-06-30 13:44:49', 1, '2026-08-19 03:23:14', '2026-08-23 11:57:21', NULL),
(6, 2, 'Libero provident libero temporibus facilis porro', 'libero-provident-libero-temporibus-facilis-porro', 'Et placeat voluptas rerum autem. Ut at maiores eveniet beatae. Esse quia deleniti quasi qui dolorem enim.\n\nAliquam iusto velit dolores ipsa inventore praesentium similique. Velit eos ab id cum id ut.\n\nEnim ut facilis quia natus. Iure exercitationem nam a dolor qui voluptatem dolorem. Rerum commodi voluptatem assumenda magni.\n\nId est earum consequatur esse molestiae. Vero amet nobis velit inventore veniam. Quia eaque quis est et reprehenderit earum. Et soluta molestiae nihil sed.\n\nAspernatur illum ea doloribus rem id ut quis. Excepturi quo ipsam hic dolorem ea praesentium possimus. Aliquam sint totam nostrum explicabo et dolor.\n\nSint tenetur corporis id dolores ea. Maxime fugit architecto velit magnam est.', 'published', NULL, NULL, '2026-06-24 23:01:57', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(7, 2, 'Esse ut et ut omnis illum', 'esse-ut-et-ut-omnis-illum', 'Quis blanditiis quisquam sequi quas fuga quis voluptas. Rerum velit non magni et in officiis et beatae. Dolores rerum cum sapiente vero. Sint veniam doloremque autem minus.\n\nVoluptatem omnis sed excepturi iste possimus. Unde expedita earum distinctio voluptatum excepturi tempora. Esse voluptas dolorum voluptatem velit.\n\nAut doloribus error dolorum et assumenda quisquam. Beatae facere deleniti autem dolore ut. Unde voluptas ea incidunt hic dolore velit. Dicta qui et doloribus dolorem vitae rerum error adipisci.\n\nSed sed nulla repellendus ut. Ea optio ex laborum. Inventore dignissimos impedit nesciunt pariatur aliquid rerum. Rerum praesentium quo beatae architecto perspiciatis ut.\n\nEsse aperiam quod non est veniam sint molestiae facilis. Eveniet consectetur sed minima in quia. Saepe et enim voluptas rerum dolorem. Velit impedit repellendus ad iure at quaerat molestias.\n\nSequi vel natus voluptas doloremque. Molestiae error omnis quis at sed. Velit odit magni nam fuga minima vel et natus.', 'published', NULL, NULL, '2026-02-22 00:34:02', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(8, 2, 'Debitis consequatur optio molestiae amet', 'debitis-consequatur-optio-molestiae-amet', 'Est cupiditate repellendus dolores sit ut provident. Non distinctio inventore quia eveniet. Facere ea fuga ut quisquam voluptate ea exercitationem facere. Expedita recusandae qui non aliquid earum incidunt et incidunt.\n\nQuis quisquam adipisci et harum qui earum error ipsa. Eaque itaque et mollitia itaque porro totam.\n\nTenetur temporibus eos temporibus tempore nesciunt consequatur. Nesciunt omnis quos quisquam corrupti ut alias officia. Veritatis molestiae occaecati nobis nesciunt.\n\nEius aut quam eos odit velit. Hic qui consequuntur reiciendis earum magnam. Odio ab minus quibusdam autem.\n\nMolestiae debitis quisquam voluptatem sequi minus deserunt. Alias aut totam ratione id in quo ratione. Eveniet possimus consectetur non tenetur eum aliquid. A tempora est eum dignissimos voluptatem voluptatem excepturi.\n\nVoluptates sed voluptas in aperiam quos aspernatur. Labore occaecati nostrum perferendis debitis. Repudiandae eius aut vero vitae aut voluptatem. Veniam consequatur laboriosam assumenda sed et. Voluptates qui sit aspernatur eos est laborum voluptas.', 'published', NULL, NULL, '2026-03-02 06:11:38', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(9, 2, 'Et praesentium id sequi natus id voluptatem nulla et', 'et-praesentium-id-sequi-natus-id-voluptatem-nulla-et', 'Ipsam eum dolores consequatur quia accusantium accusantium ipsa. Asperiores omnis voluptas aut doloremque beatae. Molestiae quidem inventore qui quis voluptates.\n\nSed voluptatem voluptatem praesentium cumque nulla. Hic voluptas sit perferendis esse magni. Et sint soluta sint. Laboriosam aut suscipit quis eum.\n\nAdipisci est molestias maxime aspernatur assumenda. Eveniet sunt est quis qui odit voluptates iusto dolore. Saepe veniam pariatur aliquid reiciendis itaque et.\n\nAmet ut recusandae ea cumque vero quia ea. Eos qui et ex et totam eveniet incidunt quaerat. Ut fugit ratione officiis voluptas molestias tenetur ut.\n\nQui voluptas nihil assumenda quasi. Recusandae voluptatem quia sunt. Cum earum iure sed expedita dolorem ratione. Nesciunt voluptate exercitationem incidunt est minima voluptatem.\n\nNon veritatis aspernatur accusamus velit. Blanditiis dolor maiores non quis a beatae. Debitis eum a omnis ea dolorum mollitia dolor. Nostrum quo eos consequuntur voluptas optio in qui. Voluptates officiis ratione deserunt cumque placeat amet ut sint.', 'published', NULL, NULL, '2026-03-24 00:59:46', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(10, 2, 'Sed quae aut sint omnis non cupiditate corporis et', 'sed-quae-aut-sint-omnis-non-cupiditate-corporis-et', 'Dolores ea accusamus et mollitia fuga dicta impedit nemo. Vel magni sit nisi est odit dolores. Voluptatem ut adipisci dolor incidunt sequi.\r\n\r\nBlanditiis itaque esse magnam. Optio blanditiis corrupti quis velit neque dolor tempora aut. Voluptatem vitae qui eaque molestiae. Nisi omnis odio repudiandae.\r\n\r\nQuia dignissimos ipsa enim. Accusamus nostrum ut quia ad. Vel amet qui ea necessitatibus. Voluptate quas in error in culpa beatae.\r\n\r\nAnimi voluptatem enim aut non. Sint rerum ut nulla libero consequatur natus nostrum. Numquam commodi veniam laborum molestias id sint blanditiis.\r\n\r\nUllam impedit sapiente cumque velit rerum enim exercitationem. Et et accusamus odio dolor incidunt expedita sint nam. Voluptates ipsam cupiditate est ratione et et dolore ipsam. Quidem consequuntur voluptates ut cum consectetur.\r\n\r\nOmnis ducimus velit in quis perspiciatis consequatur ut amet. Ea enim repellendus optio qui aspernatur. Alias delectus sapiente rerum impedit qui recusandae. Reiciendis et recusandae dolor non rerum.', 'published', NULL, 'posts/ZhytmTlF4RS0D8Qx9kZqr2xekj7I75ruaHvp7m8B.jpg', '2026-04-05 20:05:21', 1, '2026-08-19 03:23:14', '2026-08-23 12:47:11', NULL),
(11, 3, 'Asperiores qui dicta odio eaque perspiciatis alias dicta', 'asperiores-qui-dicta-odio-eaque-perspiciatis-alias-dicta', 'Aut iste cum facere. Est quod voluptas et ipsa eos repudiandae. Modi eius nemo et.\n\nVoluptatem et quibusdam reprehenderit explicabo ad odio dolor. Fugit et repudiandae nobis non doloribus. Distinctio aut beatae enim reprehenderit omnis.\n\nEos minus porro rerum est. Autem placeat dolores provident excepturi quod. Nisi reiciendis est veniam molestias unde voluptas nisi.\n\nQuia error aperiam similique nostrum temporibus. Est fugit placeat perspiciatis omnis in voluptatem aut. Et quod beatae consequatur tempore non. Aut et sunt error laudantium vel mollitia.\n\nRepellendus voluptate repudiandae totam nemo nihil. Saepe recusandae sit veniam deserunt. Assumenda suscipit facilis velit facere facilis sit sequi.\n\nExcepturi ea modi voluptas explicabo ex ipsum. Suscipit similique voluptatem ipsa atque est velit. Minus tenetur sint nisi quae.', 'published', NULL, NULL, '2026-05-26 20:16:05', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(12, 3, 'Perferendis aut fugiat est ab et voluptatem', 'perferendis-aut-fugiat-est-ab-et-voluptatem', 'Ut adipisci voluptatem qui quos voluptatem in. Et repudiandae aliquid repudiandae aut et ea rerum. Vel doloremque sunt recusandae corporis.\n\nQuos quibusdam quia aut quia a. Ad possimus soluta ut et. Ut provident atque aspernatur eligendi et corporis ad quasi. Pariatur veritatis animi beatae provident eos quia.\n\nDucimus voluptas deserunt adipisci enim aut nisi. Laudantium odit ea debitis natus occaecati nihil. Est porro quo ipsum. Voluptas porro incidunt repellat omnis illo.\n\nQui suscipit quis maiores sit aut. Architecto saepe quasi voluptatem voluptatum enim. Dolorem cum quia qui debitis facere rerum molestiae.\n\nQuia qui quibusdam nisi numquam omnis temporibus laudantium at. Dolores eligendi at at eum beatae. Et soluta nostrum aut aut. Beatae sunt ut omnis illo alias.\n\nIpsa minus sunt quis molestiae expedita. Quia nisi ut optio. Veniam doloribus qui impedit.', 'published', NULL, NULL, '2026-06-19 05:26:35', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(13, 3, 'Iste corrupti dolorum et et nesciunt quis', 'iste-corrupti-dolorum-et-et-nesciunt-quis', 'Alias dolorem commodi at non. Quis sapiente earum fugit quia. Quos consequatur ut nesciunt ipsa sed in occaecati dolor. Laborum itaque dicta officia.\n\nAccusamus impedit occaecati vitae velit rem aut molestiae. Et eos ullam rem. Est quisquam laboriosam labore aut eum corrupti voluptatem neque.\n\nMagni et maxime sed. Pariatur aut non aut consequuntur. Enim distinctio aut voluptas quo magni. Quidem rerum fugiat ipsam consequatur quidem quae.\n\nAut velit necessitatibus qui minus nulla molestiae. Aut nesciunt ut fugiat perferendis. Aperiam quidem earum quia quod consequuntur facere. Temporibus ut optio qui ducimus sed.\n\nRepellat quasi culpa dolorem et et qui illum nemo. Amet nulla minima consequuntur ut cum et inventore aut. Aut veritatis amet quis est dolorum alias. Sed dolores id id ratione sed omnis voluptatibus.\n\nNesciunt autem animi sed ut. Qui quia ipsa et. Et autem velit qui consectetur eos.', 'published', NULL, NULL, NULL, 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(14, 3, 'Quis ea unde rerum explicabo autem voluptas', 'quis-ea-unde-rerum-explicabo-autem-voluptas', 'Quod nemo autem quo dicta sunt cupiditate. Dolores temporibus dolores quo saepe tempore optio. Perferendis quo repellat commodi eligendi.\r\n\r\nEt quo sed et voluptatem ex molestias temporibus. Expedita error perferendis omnis reprehenderit doloremque iure repellendus. Rerum distinctio odio eaque qui nemo officiis nostrum repellat. Dignissimos beatae vitae libero excepturi.\r\n\r\nUt eaque doloribus totam ad officiis ea sit. Omnis at non qui alias iusto optio enim et.\r\n\r\nQuisquam ipsam impedit distinctio quibusdam asperiores. Ex deserunt minima velit vitae. Modi aspernatur qui rerum sit. Exercitationem hic in eius dolorem voluptatem atque omnis.\r\n\r\nAut in quis quia commodi ab. Et ut vel et molestiae omnis distinctio. Facere illo voluptatem numquam praesentium quas quo officiis.\r\n\r\nVoluptatem molestiae quis non molestiae expedita. Voluptas qui hic possimus sunt sequi doloribus. Accusamus et mollitia voluptatem aut nihil eos sit. Officia facilis illum quibusdam eligendi sapiente veniam. Eum earum error officia possimus et voluptatem.', 'published', NULL, 'posts/O4v34HmqWHt1W9SdmdMp4Bac6kGKkRf4pRXflUXE.jpg', '2026-06-16 06:56:21', 1, '2026-08-19 03:23:14', '2026-08-23 12:46:12', NULL),
(15, 3, 'Quo deleniti voluptas nemo dicta sed et facere', 'quo-deleniti-voluptas-nemo-dicta-sed-et-facere', 'Non inventore corrupti nemo ratione est enim. Aut velit cupiditate officia sapiente aut exercitationem dolor. Autem ut blanditiis quaerat doloribus ea voluptates. Accusantium iste temporibus doloremque ducimus iure possimus.\r\n\r\nNon ratione porro fugiat non. Delectus sit voluptas praesentium.\r\n\r\nExercitationem et id est nulla deserunt illum. Doloribus nihil sint voluptatum non tempora. Aut nostrum aut modi est. Ut quidem et beatae perferendis nihil.\r\n\r\nConsequatur quidem necessitatibus alias. Consequatur consequatur optio molestiae dolor aut eos. Facilis molestiae reiciendis dolorum nobis voluptatem laudantium voluptatem. Et aut placeat libero commodi.\r\n\r\nSed repellat aut in placeat ducimus ea. Placeat velit earum tempore dolores. Fugiat eveniet mollitia fuga quas aut.\r\n\r\nEt magnam sit ut. Ut hic quidem provident. Reprehenderit animi eum incidunt qui.', 'published', NULL, 'posts/kfYQD6aTjpd89aZE1OdehJy0IDNOLheQfGNh7wZb.jpg', '2026-07-28 05:52:46', 1, '2026-08-19 03:23:14', '2026-08-23 11:34:17', NULL),
(16, 4, 'Explicabo quia saepe ut inventore sint enim ut', 'explicabo-quia-saepe-ut-inventore-sint-enim-ut', 'Voluptate quam ullam itaque non vitae et suscipit. Est nihil dolores harum ab ratione. Sed veniam eligendi dolore libero officiis tempora.\r\n\r\nHarum ullam aut qui ut consequatur. Quidem aut et laborum recusandae et. Deserunt ratione enim eum et beatae. Voluptas id inventore sit in nihil id et.\r\n\r\nQuia quibusdam illo magnam quibusdam odit sed minima. Sed laudantium nemo laborum provident quos dolores. Id tenetur facere deserunt voluptas nam consequuntur. Omnis quod ea consectetur atque velit ad impedit.\r\n\r\nIpsum quia ex qui voluptatibus rerum sunt. Sed cupiditate tempore nobis qui. Quod dignissimos sunt architecto vitae. Ab velit occaecati possimus voluptatem excepturi.\r\n\r\nSaepe fugit nulla consequatur qui consectetur praesentium assumenda. Aliquam laudantium et itaque ducimus voluptas. Molestias quibusdam quia blanditiis eveniet et sint minus.\r\n\r\nQui placeat aspernatur ut aut. Natus explicabo nobis iure sequi quasi repudiandae. Esse rerum error quia. Ut repudiandae repellat magni facere. Est laudantium voluptas et.', 'published', NULL, 'posts/DRbE7i3ed1aGhkaHTRGX8kHrqbXcqyuIDgRepFjS.jpg', '2026-04-19 18:54:54', 1, '2026-08-19 03:23:14', '2026-08-24 01:37:35', NULL),
(17, 4, 'Tempore ad iure ut et velit', 'tempore-ad-iure-ut-et-velit', 'Eaque sequi magni quasi iste. Aut est velit enim. Culpa ut eum consequuntur quia omnis et aut.\n\nEum nobis sapiente velit quis optio. Quia omnis error quia aspernatur sapiente expedita. Consectetur sint sit et doloremque. Inventore expedita aut ea nobis molestiae beatae perferendis.\n\nNihil voluptatibus quia doloribus est sint cumque corporis. Facere error rerum dolor sint quos. Deserunt sint distinctio non sint impedit asperiores. Eligendi vero beatae ad. Animi dignissimos rem qui recusandae voluptate magnam.\n\nDebitis minus non odit aliquid velit quos. Et magni assumenda quia. In facere facere veniam incidunt saepe iusto. Consequatur qui quo quisquam nostrum nobis et animi modi. Dolores omnis rerum officia impedit ducimus labore.\n\nQuia cumque doloremque voluptatem libero. Neque voluptas aut labore consequatur non quibusdam perferendis. Amet cupiditate ratione omnis sequi voluptatem veritatis beatae. Nihil deserunt ut nesciunt autem.\n\nMolestias aut sunt quos corrupti deserunt est adipisci modi. Omnis id aliquid aliquam rem. Non nihil harum facere dicta error.', 'published', NULL, NULL, NULL, 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(18, 4, 'Ducimus nulla ut tempore occaecati optio amet illo', 'ducimus-nulla-ut-tempore-occaecati-optio-amet-illo', 'Praesentium veritatis optio dolore temporibus similique quam. Qui sunt facilis rerum non dolorem optio est. Autem cupiditate omnis optio perspiciatis deleniti deserunt itaque. Dolor fugit dolor animi praesentium inventore cupiditate nesciunt.\n\nQuo recusandae magni eius blanditiis. Dolorem minus cumque voluptates odio ea necessitatibus nostrum. Et illo error unde aspernatur eligendi et. Et quia ad totam velit.\n\nLaboriosam laboriosam aut autem et. Velit itaque eaque nihil libero ab enim. Et eum hic exercitationem voluptates sint quo. Necessitatibus velit sapiente porro voluptatibus voluptas quis quia voluptatem.\n\nOccaecati consequatur architecto aut. Et sit ullam sed error ducimus similique. Non necessitatibus est et.\n\nCumque perspiciatis nihil iusto commodi ullam sunt. Quo fuga repellendus sequi quis aut voluptas non. Explicabo vel sed molestiae ea enim minima.\n\nVeritatis temporibus id minus voluptatem esse voluptatem aspernatur. Natus molestiae officiis qui reprehenderit et. Esse vitae debitis odit vitae.', 'published', NULL, NULL, '2026-04-13 06:31:27', 0, '2026-08-19 03:23:14', '2026-08-19 03:23:14', NULL),
(19, 4, 'Reiciendis dicta voluptatum odio est aliquam', 'reiciendis-dicta-voluptatum-odio-est-aliquam', 'Sit id soluta nesciunt perferendis expedita et saepe reprehenderit. Consequatur exercitationem eveniet quod fugit. Est et excepturi quod maxime dolores. Eum accusamus quia magni iusto illo eaque doloribus.\r\n\r\nDignissimos hic eaque iusto atque. Veniam dolor et modi laborum. Earum suscipit praesentium nihil alias quibusdam placeat.\r\n\r\nAspernatur velit quas quia et ipsum soluta. Numquam qui vero fugiat ut reiciendis minima aut. Totam optio adipisci eius sunt ex. Labore voluptatem quaerat cumque illum.\r\n\r\nItaque a tenetur delectus nobis corporis veritatis velit. Quia porro ut iusto alias mollitia eum. Nulla est omnis aliquam eaque quibusdam libero.\r\n\r\nEt ad corporis qui quod qui maiores. Laboriosam occaecati exercitationem quis officiis sit. Pariatur et quo omnis laborum natus.\r\n\r\nEnim vel ad eveniet sint eos. Non labore possimus molestias commodi consectetur nam ut. Et itaque tempora consequatur dolorem. Sint provident asperiores rerum quae.', 'published', NULL, 'posts/PeeY7zsdmk5fTHwt98NmgkUVQk9xzmdlXyfM8bV1.jpg', '2026-05-20 19:07:33', 1, '2026-08-19 03:23:14', '2026-08-23 12:51:42', NULL),
(20, 4, 'Vitae corporis reiciendis vitae deserunt aut laudantium', 'vitae-corporis-reiciendis-vitae-deserunt-aut-laudantium', 'Qui corrupti quo voluptatum possimus. Et modi dolor dolor reprehenderit ad doloribus. Veritatis adipisci ut nihil delectus et est recusandae sunt.\r\n\r\nDolores sint cupiditate nulla voluptatibus blanditiis numquam reiciendis. Rerum est et illum debitis quae dicta. Error omnis et molestias sint corrupti vel modi totam.\r\n\r\nDeleniti repellat rerum pariatur saepe. Blanditiis et eius voluptatem maiores sint voluptatum. Tempore provident est et omnis architecto quibusdam. Qui architecto sed nisi quia libero animi.\r\n\r\nCorrupti minima quas veritatis voluptas nemo explicabo iure. Odit ducimus aliquid at magni possimus sit consequatur. Rerum adipisci dolores inventore sint inventore quo. Recusandae consequatur earum magnam nihil in.\r\n\r\nAnimi quas mollitia suscipit. Aliquam nemo nostrum eaque cum iste culpa debitis voluptatum. Beatae maiores non consequuntur maxime nihil. Pariatur non asperiores ut doloribus qui quaerat. Consequatur voluptas et nulla perspiciatis quaerat.\r\n\r\nAb aliquam sunt suscipit atque sunt in eum. Necessitatibus beatae tempore laboriosam explicabo repellendus.', 'published', NULL, 'posts/7cB6agpRJaSbqNmIq1utWTJyUndOwdXhGq3rkmKq.jpg', '2026-06-27 13:08:41', 1, '2026-08-19 03:23:14', '2026-08-23 12:50:17', NULL),
(21, 5, 'Sed nesciunt quis animi ducimus dicta odio eveniet fugit', 'sed-nesciunt-quis-animi-ducimus-dicta-odio-eveniet-fugit', 'Quae distinctio illo beatae non qui omnis delectus. Impedit omnis aut perspiciatis et quasi perferendis. Assumenda aut aspernatur temporibus consequatur suscipit officia qui aut. Id dignissimos et minus quas esse aperiam.\r\n\r\nProvident quibusdam architecto debitis quia consequuntur eaque. Et ut possimus veritatis molestiae eum. Facilis distinctio ullam sit accusamus molestiae. Cupiditate quos quo sunt eligendi id vero perspiciatis.\r\n\r\nIllum laborum eum molestiae id necessitatibus. Sit voluptate expedita ducimus voluptatem. Natus animi reiciendis aut enim eius.\r\n\r\nIure a sed officiis numquam assumenda qui asperiores. Incidunt corrupti voluptas recusandae aut et optio. Error in sit autem voluptatibus tempore.\r\n\r\nOfficiis et aut quas eveniet praesentium. Enim quia eum porro et est voluptatum adipisci. Sit eligendi non itaque velit eum eum laborum. Qui maiores voluptatibus et nihil velit quae.\r\n\r\nAtque illo ratione quia. Impedit consequatur necessitatibus aliquam.', 'published', NULL, 'posts/HcHl7cvJUrGyyY61B2myDH8lcrlxqvDXDD9Egqx5.jpg', '2026-06-28 08:10:54', 1, '2026-08-19 03:23:14', '2026-08-23 12:02:28', NULL),
(22, 5, 'Quod officia eius facilis quia maxime', 'quod-officia-eius-facilis-quia-maxime', 'Nobis beatae ratione a fugiat suscipit voluptas totam nostrum. Nulla id provident autem eos sapiente architecto. Possimus nihil eligendi rerum ut quia. Eum commodi enim sed exercitationem temporibus eaque.\r\n\r\nUt ut totam culpa voluptatem. Molestias et quia iusto quia. Iusto vitae quo eligendi omnis voluptatem iure ad qui.\r\n\r\nRecusandae hic qui non cum ducimus. Ut nihil et similique dolores tempora tempore qui. Facere repellat non quis.\r\n\r\nRepellendus sunt doloribus dolor est id. Consequatur quibusdam velit animi sint in placeat. Illo non sunt numquam. Et laborum nostrum itaque tenetur dolorem.\r\n\r\nQuaerat aut ad quibusdam omnis deleniti minima cupiditate. Odit quas et cupiditate. Consequatur laborum dignissimos quidem omnis qui quia dolore. Sed modi esse voluptas in. Maxime hic vel aut sit sunt voluptate aut voluptas.\r\n\r\nSuscipit ut ut nulla adipisci. Minima blanditiis excepturi qui quia repudiandae dignissimos. Natus sequi necessitatibus dignissimos in dolores.', 'published', NULL, 'posts/oMsQBVaku0ngBWAj2ZdKMlWeXYTMtUC3yXKle2E7.jpg', '2026-08-20 05:08:06', 1, '2026-08-19 03:23:15', '2026-08-20 05:08:06', NULL),
(23, 5, 'Aut minus eos iste voluptas', 'aut-minus-eos-iste-voluptas', 'Suscipit id suscipit asperiores velit. Omnis velit voluptates ipsum voluptatem blanditiis et vel.\r\n\r\nSit dolores molestiae dicta ea. Qui atque praesentium autem error. Quis facilis aliquam corrupti nostrum minima in autem.\r\n\r\nOmnis non est consequatur dolores. Quisquam enim et enim pariatur. Sit ut ut laborum repudiandae accusantium voluptatem. Corrupti et recusandae aliquid eum consectetur dignissimos aut accusantium.\r\n\r\nMinus voluptate ea voluptatem expedita atque ut quia. Et distinctio repellat repellendus qui placeat. Aut impedit cum qui eaque possimus.\r\n\r\nEnim qui aperiam voluptates aut. Sit in sit velit laudantium omnis ut. Temporibus ex rem nostrum hic. Voluptatem sit a rerum est perspiciatis tenetur.\r\n\r\nQuia inventore perspiciatis est necessitatibus voluptatem illo. Reprehenderit recusandae nihil voluptas nostrum omnis iusto ex. Ipsum modi debitis quidem delectus nostrum quos minima.', 'published', NULL, 'posts/vMqHKR3CFrsqTFoSKjWljcBi4cUoTWaxHZM12Gzw.jpg', '2026-08-20 23:43:15', 1, '2026-08-19 03:23:15', '2026-08-20 23:43:15', NULL),
(24, 5, 'Quia hic ut dicta quibusdam nisi omnis', 'quia-hic-ut-dicta-quibusdam-nisi-omnis', 'Error vero veniam recusandae fugiat distinctio omnis aliquid quis. Doloremque maiores ut quas nisi id ut. Labore voluptas ipsa dolorem voluptatum necessitatibus pariatur. Sit minus animi qui ex recusandae.\r\n\r\nA nostrum quis reprehenderit. Velit quia et optio iste nihil sit.\r\n\r\nA dolor enim suscipit est et dolorum eius. Dolores iste qui ipsam voluptatem esse pariatur ut. Dolore est et veniam provident aut corrupti.\r\n\r\nLaborum dolores id quis maxime tempore. Velit rerum repellendus veniam eius et sequi maxime laudantium. Consectetur autem nostrum soluta et nisi aut voluptas ex.\r\n\r\nConsequuntur a laudantium tempore eligendi iure. Non eaque numquam et qui distinctio assumenda consequatur officiis. Libero blanditiis id ut tempore neque et excepturi. Doloremque numquam repellendus porro velit saepe impedit perferendis.\r\n\r\nQuos quas ad reprehenderit debitis. Explicabo non quis sit eum. Officiis qui vel dignissimos voluptatum.', 'published', NULL, 'posts/GDuLKumCtQt1hqDyLF1Dmg32Fsc0cwewz9QRwRZw.jpg', '2026-05-27 23:34:41', 1, '2026-08-19 03:23:15', '2026-08-20 23:43:36', NULL),
(25, 5, 'Nihil labore autem nihil perspiciatis ea temporibus dignissimos', 'nihil-labore-autem-nihil-perspiciatis-ea-temporibus-dignissimos', 'Et cum aliquam et perspiciatis enim perspiciatis. Ullam eius nam ut assumenda dolor quia unde. Qui sint eos nam numquam necessitatibus quia sed.\r\n\r\nDeleniti eligendi facere quae eius sint. Ut eum nostrum aut doloremque praesentium iure. Ea qui quia reprehenderit nisi omnis sed impedit.\r\n\r\nQui mollitia vero minus non ipsam. Quia deleniti deserunt dolor quo magni eligendi.\r\n\r\nDoloribus ipsam unde minus aut. Non ea sit doloribus eum est. Reiciendis in fugiat totam quod et officiis illo. Nihil et aut maiores ut magni molestias error similique.\r\n\r\nUt nam molestiae qui quis aliquam molestias dolor. Et iure illo excepturi et ratione voluptas. Dolorum totam quod facere est voluptas aliquam asperiores. Impedit quos et non libero.\r\n\r\nUt blanditiis aut molestiae itaque non assumenda fugiat. Illo eum sint sequi. Expedita facilis sapiente rerum praesentium. Illum assumenda culpa accusantium sed deleniti.', 'published', NULL, 'posts/iA3gNdPgGRcRrzQJaHtEkkOMiSABCYthGxqGxpqC.jpg', '2026-08-20 23:47:08', 1, '2026-08-19 03:23:15', '2026-08-20 23:47:08', NULL),
(26, 6, 'Et sequi laudantium qui ducimus tempora', 'et-sequi-laudantium-qui-ducimus-tempora', 'Aspernatur asperiores earum qui perferendis sint quisquam. Occaecati ipsum fuga aliquid necessitatibus consequatur. Quas facere ducimus dicta ea est ipsum et sit. Aliquam qui ut dolores hic.\r\n\r\nConsequatur quia dolorem nisi explicabo maiores et. Veritatis sapiente amet quia laudantium omnis quis voluptatum. Voluptas et dolores sed. Molestiae eum exercitationem porro velit.\r\n\r\nNon et optio a modi similique. Sit et iusto explicabo corporis est dolores. Dolorem ipsum qui dolorem qui reiciendis nobis.\r\n\r\nEx et nihil quae aut aliquam deserunt. Ut earum officiis non fugiat dolores voluptate et. Nesciunt fugiat blanditiis officia est.\r\n\r\nSunt voluptatum aut in quidem eaque reprehenderit voluptas. Nemo sapiente quos qui ullam laboriosam quis. Quisquam ex distinctio voluptatem quidem in et ut. Provident unde est eaque.\r\n\r\nVoluptatibus sed optio iure laudantium vitae voluptas consequatur. Repudiandae dolores repudiandae nulla modi. Laborum dolor maiores inventore. Optio explicabo magni at debitis omnis repellendus tenetur doloremque.', 'published', NULL, 'posts/zZAGMRwYwl0vVdY2ErdUecJFMO3cETccsJezfUoZ.jpg', '2026-07-25 17:36:55', 1, '2026-08-19 03:23:15', '2026-08-23 11:19:12', NULL),
(27, 6, 'Omnis iusto eum et dicta', 'omnis-iusto-eum-et-dicta', 'Ea illum repellat est dolore est dolores. Vel adipisci fuga labore sapiente suscipit et cumque. Maxime maxime dolores et.\r\n\r\nAut et sit sint mollitia. Cum possimus magnam aut qui nostrum dolor. Et sit officia veniam.\r\n\r\nReprehenderit laudantium nihil aut facere neque. Magnam veritatis hic consequatur voluptatem. Quia reiciendis velit non sit perferendis quidem debitis.\r\n\r\nTempora maxime repellendus laboriosam distinctio earum ratione. Corporis sunt ea tempora architecto ut voluptas. Modi quam sit sit et.\r\n\r\nVoluptas autem sed nobis. Neque asperiores totam quasi consequatur atque.\r\n\r\nEa ut ex consectetur qui. Autem cumque maxime qui quam perferendis asperiores tenetur. Quo aut recusandae molestiae dicta. Qui consequatur tempore hic tenetur vitae ad.', 'published', NULL, 'posts/cXJrPK6rOpFw5ogsnCRgFnSgFpO2XZOYinHwXBc7.jpg', '2026-06-09 04:05:24', 1, '2026-08-19 03:23:15', '2026-08-23 11:20:44', NULL),
(28, 6, 'Ab qui debitis molestiae aliquam doloribus', 'ab-qui-debitis-molestiae-aliquam-doloribus', 'Animi dolores animi eveniet est et quis. Non incidunt qui autem et. Qui incidunt provident debitis provident sunt nobis. Possimus beatae eos aut qui voluptate.\r\n\r\nSequi error et a quos sapiente. Consectetur sequi est molestiae dolores fuga voluptatem facilis. Corporis vitae nobis quod labore fugit eaque ut est.\r\n\r\nDolorum dolores sed molestiae animi nostrum. Sunt recusandae aut qui dolores dolorem saepe.\r\n\r\nFuga rem temporibus porro fugit eveniet. Sint fugit aspernatur minima quo. Voluptatem similique omnis nobis ipsam commodi blanditiis nulla. Odit iste reiciendis repellendus voluptate minima facilis.\r\n\r\nDolores est aut neque quasi. Iste ab culpa et pariatur eos aut qui. Voluptas ut accusantium dolores voluptate id adipisci est. Illo sed et dolores totam consequatur odio rem ipsum.\r\n\r\nLibero quidem eaque officia enim. Ex deserunt ea nisi et nulla ullam nisi aperiam. Ut quis molestias est. Esse consectetur natus et quis alias magni autem.', 'published', NULL, 'posts/W22UYJMJBj5uB6KHQoDWDXX7ND8W6cs4xQKhTmNR.jpg', '2026-08-23 11:21:17', 1, '2026-08-19 03:23:15', '2026-08-23 11:21:17', NULL),
(29, 6, 'Et magni voluptas repudiandae', 'et-magni-voluptas-repudiandae', 'Accusantium voluptas ad incidunt dolorum molestiae minima vero. Eum voluptas libero et est modi. Voluptatibus quam suscipit mollitia quidem temporibus est similique modi. Ipsa vitae nemo ipsa corrupti.\r\n\r\nOdit corrupti iusto natus et et. Laboriosam rerum aperiam dolores. Odit vero ut qui quae. Sunt doloribus ut omnis voluptatem nam officiis optio.\r\n\r\nNecessitatibus fugiat quos aut eos eos amet sit. Doloremque assumenda non molestias aliquam. Est ipsam delectus non quia sit voluptatem labore. Est nam est iste debitis odio qui et.\r\n\r\nConsectetur eaque voluptatem exercitationem vel tempora cupiditate. Sed quae sequi consequatur voluptatem architecto autem at. Est est ad minus pariatur velit porro. Minima minima error illum nulla.\r\n\r\nEaque pariatur sed non in corrupti delectus tempora. Incidunt est vero a quam. Voluptatum quidem accusantium necessitatibus facilis.\r\n\r\nError aut dolorem porro temporibus illum a. Enim odit laborum ad et doloribus. Odio non eos consequatur temporibus. Veritatis voluptates delectus cupiditate quae vel eos voluptatem repudiandae.', 'published', NULL, 'posts/faD2CwcgwRYrUbSDsjv7TRV1QiGNAkqKrSLeLL42.jpg', '2026-03-07 18:37:23', 1, '2026-08-19 03:23:15', '2026-08-23 11:21:40', NULL),
(30, 6, 'Quasi architecto et ipsa atque', 'quasi-architecto-et-ipsa-atque', 'Minus odio magni et fugiat sed itaque rerum. Ab et provident dolor quis eaque cum sed.\r\n\r\nVoluptatem magnam praesentium mollitia commodi officiis magni rerum sed. Quibusdam quibusdam corporis omnis nulla cumque placeat. Perspiciatis praesentium facilis quis quod quis rerum consequatur est.\r\n\r\nQuia neque fugiat inventore dolores. Aut veniam recusandae dolorem porro nisi. Eos placeat qui eos velit fugiat soluta magni enim. Vel cum repellendus voluptas sit ut.\r\n\r\nUnde earum quidem et reprehenderit error vitae aut. Omnis consequatur unde odio ipsa nostrum esse accusamus. Nulla voluptates impedit deserunt aut.\r\n\r\nNihil dolor deserunt voluptates inventore quo. Rerum molestiae consequatur accusantium ut minus nobis repellat.\r\n\r\nUt esse qui iure voluptatem et provident praesentium. Aut in consequatur aut error. Nam quis natus voluptas velit animi qui nam. Et laudantium omnis et reiciendis tempora est est.', 'published', NULL, 'posts/nRtW3heGmh1jp3WOdUG3NqDnCQRsudxpqRBy6hrr.jpg', '2026-07-29 21:59:26', 1, '2026-08-19 03:23:15', '2026-08-23 11:22:08', NULL),
(31, 5, 'Blog Post', 'blog-post-6a86b02ae4f1b', 'Here’s a crazy stat: 90% of the world’s data was created in the last two years.\r\n\r\nImpressive to think about, right?\r\n\r\nSo it shouldn’t be too shocking to see that everyone is blogging right now.\r\n\r\nI mean, blogs are great. This blog has changed my life. Blogs have turned people into media companies, experts, and even tv stars.\r\n\r\nTrue story, WAY back in 2010 I quite my job and moved to Thailand. Location Rebel was in it’s infancy.\r\n\r\nI was living in a $200/month single room apartment in Bangkok that didn’t even have a kitchen.\r\n\r\nMy friend Mark was doing the exact same thing. New blog, same crappy apartment.\r\n\r\nMark’s site was called Migrationology. It was all about food.\r\n\r\nFast forward to now, and guess what?\r\n\r\nMark has just shy of 10 million YouTube subscribers.\r\n\r\nAnd even cooler than that?\r\n\r\nHe has his own show on HBO.\r\n\r\nAll because he started a blog about something he was passionate about.\r\n\r\nNow that’s not to say all you have to do to see success is start a blog, wait a hot minute, and boom, you’re on the beach drinking out of a coconut.', 'published', NULL, 'posts/LMpTZN46Ne1xDHgSXcdsqN5TzoSIajshVXNoj0vN.jpg', '2026-08-20 02:31:28', 1, '2026-08-20 00:17:18', '2026-08-20 23:32:33', NULL),
(32, 4, 'Blog Image', 'blog-image-6a86afb79433a', 'Ready to turn your passion into profit? ☀️As a seasoned blogger, I\'ve seen firsthand the incredible opportunities that come with building your own platform. 💼 Whether you\'re a budding entrepreneur or a seasoned business owner, blogging can be a game-changer for your brand. It\'s not just about sharing your expertise—it\'s about connecting with your audience, establishing authority, and driving business growth.', 'published', NULL, 'posts/DOLzFIonHDTAXSoqfgY7SmsgiZ7rPv4CQPCVkKy6.jpg', '2026-08-27 01:55:33', 1, '2026-08-20 02:30:30', '2026-08-27 01:55:33', NULL),
(33, 7, 'Cyber Threats', 'cyber-threats-6a86b5bab3aab', 'A cyber threat is any malicious action or event designed to gain unauthorized access, steal data, damage systems, or disrupt digital operations. These threats originate from various actors—including hackers, organized crime, and hostile states—aiming to compromise computer networks, devices, and sensitive informatio', 'published', NULL, 'posts/QVKAL6U55VlMqpVFYcogThgsn9tLcNh31FcMcFpZ.jpg', '2026-08-21 04:36:45', 1, '2026-08-20 03:07:22', '2026-08-21 04:36:45', NULL),
(34, 4, 'Author Blog', 'author-blog-6y9oUf', 'Use simple website builders like WordPress or Wix to host your blog.Choose a domain name: Pick a clear name that uses your own name or your book series.Plan your content: Write about your books, your editing process, or book recommendations.Add a call to action: Put links on your pages to help visitors buy your books.', 'pending', NULL, NULL, NULL, 0, '2026-08-25 01:45:04', '2026-08-27 05:14:20', 4),
(35, 5, 'a', 'a-CeLTrG', 'abc', 'draft', NULL, 'posts/bYQPzxuHSEuW3A5fBJykSVqO8ghjriglTCpHoFGT.jpg', NULL, 0, '2026-08-27 05:14:50', '2026-08-31 05:55:50', 4),
(36, 3, 'example', 'example', 'example image done', 'draft', NULL, 'posts/N9aFs7Susw3zBqf9GkVFH3iDYoVtCTtoD25iNMBu.jpg', NULL, 0, '2026-08-27 05:26:59', '2026-08-27 05:28:12', 1),
(37, 4, 'eg', 'eg-WhzjIO', 'start anyway', 'published', NULL, 'posts/eeVQtnX7XRj3kK5Yi9cAg7YALnfHXkUruVO7W35Z.jpg', '2026-08-30 20:04:23', 1, '2026-08-27 05:33:16', '2026-08-30 20:04:23', 4),
(38, 7, 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-wEPiJE', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since 1966 is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support. Donate bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nNodeJS Python Interface GTK Lipsum Rails .NET\r\nThe standard Lorem Ipsum passage, used since 1966\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"\r\n\r\nhelp@lipsum.com\r\nPrivacy Policy ·', 'published', NULL, 'posts/55TEAYEW5t7HehY4kZibn7Jc3smfwOy61UYolviF.jpg', '2026-08-31 06:08:46', 1, '2026-08-31 06:07:23', '2026-09-03 00:53:23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_user_bookmark`
--

CREATE TABLE `post_user_bookmark` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_user_bookmark`
--

INSERT INTO `post_user_bookmark` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 22, '2026-08-25 21:41:02', '2026-08-25 21:41:02'),
(2, 1, 23, '2026-08-25 21:41:21', '2026-08-25 21:41:21'),
(3, 5, 22, '2026-08-26 16:53:52', '2026-08-26 16:53:52'),
(4, 4, 22, '2026-08-26 17:44:24', '2026-08-26 17:44:24'),
(5, 1, 32, '2026-08-27 01:36:23', '2026-08-27 01:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `post_user_history`
--

CREATE TABLE `post_user_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_at` timestamp NULL DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_user_history`
--

INSERT INTO `post_user_history` (`id`, `user_id`, `viewed_at`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-09-03 00:54:21', 22, '2026-08-25 21:44:25', '2026-09-03 00:54:21'),
(2, 1, NULL, 6, '2026-08-25 21:44:28', '2026-08-25 21:44:28'),
(3, 1, NULL, 23, '2026-08-25 21:44:31', '2026-08-28 01:00:22'),
(4, 1, NULL, 33, '2026-08-26 15:57:38', '2026-08-27 01:54:57'),
(5, 5, NULL, 22, '2026-08-26 16:53:46', '2026-08-30 06:03:14'),
(6, 4, NULL, 22, '2026-08-26 17:44:14', '2026-08-27 06:17:04'),
(7, 4, NULL, 25, '2026-08-26 23:49:27', '2026-08-26 23:49:27'),
(8, 1, NULL, 32, '2026-08-27 01:36:14', '2026-08-30 01:28:46'),
(9, 5, NULL, 30, '2026-08-30 05:54:26', '2026-08-30 05:54:26'),
(10, 5, NULL, 29, '2026-08-30 05:54:42', '2026-08-30 05:54:42'),
(11, 5, NULL, 16, '2026-08-30 05:54:52', '2026-08-30 05:54:52'),
(12, 5, NULL, 33, '2026-08-30 20:03:08', '2026-09-01 03:54:59'),
(13, 1, NULL, 38, '2026-08-31 06:08:53', '2026-08-31 06:10:37'),
(14, 5, NULL, 37, '2026-09-01 03:44:43', '2026-09-01 03:44:43'),
(15, 5, NULL, 10, '2026-09-01 03:44:51', '2026-09-01 03:44:51'),
(16, 5, '2026-09-02 04:40:04', 28, '2026-09-02 04:40:04', '2026-09-02 04:40:04'),
(17, 1, '2026-09-03 00:54:08', 37, '2026-09-03 00:54:08', '2026-09-03 00:54:08'),
(18, 1, '2026-09-03 00:54:15', 13, '2026-09-03 00:54:15', '2026-09-03 00:54:15'),
(19, 4, '2026-09-03 01:46:56', 33, '2026-09-03 01:46:56', '2026-09-03 01:46:56'),
(20, 4, '2026-09-03 01:47:32', 3, '2026-09-03 01:47:32', '2026-09-03 01:47:32'),
(21, 4, '2026-09-03 01:47:42', 2, '2026-09-03 01:47:42', '2026-09-03 01:47:42'),
(22, 4, '2026-09-03 01:47:50', 27, '2026-09-03 01:47:50', '2026-09-03 01:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 'web', '2026-08-19 03:23:14', '2026-08-19 03:23:14'),
(2, 'author', 'author', NULL, 'web', '2026-08-19 03:23:14', '2026-08-19 03:23:14'),
(3, 'Administrator', 'admin', 'Full access to everything', 'web', '2026-08-20 04:30:44', '2026-08-20 04:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
('Fwkr9eEO5A9bcFMKeqa3J9bp91p4rlsxXe5uhlUl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJSd3NBZFNHeXRZTWNWQzA0TFlTOGF4TldHUk9kUjYwSzdhOEN2endLIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788420937),
('oGPBXNtN7sim4B2LnVkJMB4HE7tPHsN0DbhYsOZL', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJZTE1SMGlEVUVKUWd3bmdia0JNb3Vpdmp1S1N1blBnbE9HTm1WN20yIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Bvc3RzIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo0fQ==', 1788418104),
('RzGn4viBLszHIV0N6hnkiLTPhlIStAWKYbxfgv5z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJRME9kbWl1OVViRlhVeTY0emxLOHVoN1VOd3l0TlNVSzlHZVBtYVZtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2VzdGFibGlzaC1kZWNpc2lvbi1lbGlnaWJsZS1yZWNvbW1lbmRhdGlvbi50cnljbG91ZGZsYXJlLmNvbVwvbG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788420699),
('YyJXOJMkeUxMQ0HtvRNyw4lctTvMQMAisytbAOc5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI5TEVET2RxeEdDRXdENno0ODM5Z2NvTGZBM3Y4SjR0STBtSktQYWtrIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZXN0YWJsaXNoLWRlY2lzaW9uLWVsaWdpYmxlLXJlY29tbWVuZGF0aW9uLnRyeWNsb3VkZmxhcmUuY29tXC9sb2dpbiJ9fQ==', 1788420913);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed_at`, `created_at`, `updated_at`) VALUES
(1, 'vishahameed111@gmail.com', '2026-08-31 23:43:05', '2026-08-31 23:43:05', '2026-08-31 23:43:05'),
(2, 'vishahameed666@gmail.com', '2026-09-03 01:46:25', '2026-09-03 01:46:25', '2026-09-03 01:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `bio`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin', 'admin@example.com', NULL, NULL, 'admin', '2026-08-19 03:23:15', '$2y$12$p/C5fc1pgNIC58Los/5cB.a80kMdzK3IBcOY.tQSAW4S2/MBmyrIq', 'NsH2LLjKLbeTYNwvaUE2EZyPmiF5bQFlkSDNt4rTSUGYWM7tAiJTyGv6TpYO', '2026-08-19 03:23:15', '2026-08-20 04:33:54', 1),
(2, 'Regular User', 'user@example.com', NULL, NULL, 'user', '2026-08-19 03:23:16', '$2y$12$GK1O4RZJ9hDu/pgM6GksL.o3jfm/jeuIiyT2EscXxgjfts4BloJEC', 'V9QkXDDd3sfNC3Kqn6cE622LHwzvsVLrt4D5a6gut8ivTjajmIaSLis7z15r', '2026-08-19 03:23:16', '2026-08-20 05:24:24', 2),
(4, 'Author User', 'author@example.com', 'avatars/zAK081dllsGJz4FBTjsmqSvdIIRB5NAAhY9OssJF.jpg', NULL, 'author', NULL, '$2y$12$8Fw1KRg.fD70TM8Qa/J14.Ojd8x7yYTKpUSM6PGgoCvQlFE.1PoEC', 'X1w8PZOcbEyy4uDO0Ha4QtTvzbacQjGKEAVP1L0sZkQ4egYjGglUE5mnAuID', '2026-08-25 00:25:30', '2026-09-03 01:43:28', 2),
(5, 'Visha Hameed', 'vishahameed666@gmail.com', 'avatars/Ec4Lanwftx4hnSdd8XCCFIZtuOTB01pKPe8YEL2W.jpg', 'hi my name is visha', 'user', NULL, '$2y$12$H4e0ZRrkN2jbS0WMEUuEse7okofvcZ8jYNoSntt/ffNbA71G9UVwG', '1JsstHzUrv8fPX75Ow1nieBiTr3gRUKuAMRzw7w8mgTIhtpzUrclranfIMNx', '2026-08-25 02:20:35', '2026-08-30 19:40:02', NULL),
(6, 'Author', 'author@gmail.com', NULL, NULL, 'author', NULL, '$2y$12$ncIttORhgXeuwe9vjxKNGe5oBS9SeODixDSDUy0tD706dJaQydqxi', NULL, '2026-08-25 02:22:45', '2026-08-26 16:41:02', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_user_bookmark`
--
ALTER TABLE `post_user_bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_bookmark_user_id_foreign` (`user_id`),
  ADD KEY `post_user_bookmark_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_user_history`
--
ALTER TABLE `post_user_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_history_user_id_foreign` (`user_id`),
  ADD KEY `post_user_history_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `post_user_bookmark`
--
ALTER TABLE `post_user_bookmark`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_user_history`
--
ALTER TABLE `post_user_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_user_bookmark`
--
ALTER TABLE `post_user_bookmark`
  ADD CONSTRAINT `post_user_bookmark_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_user_bookmark_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_user_history`
--
ALTER TABLE `post_user_history`
  ADD CONSTRAINT `post_user_history_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_user_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
