-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2023 lúc 09:58 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movie_app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Phim mới', 'phim-moi', 'Phim mới cập nhật hằng ngày', 1, 0, '2023-08-05 11:37:36', '2023-08-14 10:00:12'),
(2, 'Phim chiếu rạp', 'phim-chieu-rap', 'Phim mới chiếu rạp hằng ngày', 1, 1, '2023-08-05 11:49:41', '2023-08-14 10:33:06'),
(4, 'Phim bộ', 'phim-bo', 'Mới', 1, 2, '2023-08-15 00:48:17', '2023-08-15 00:48:17'),
(5, 'Phim thuyết minh', 'phim-thuyet-minh', 'Cập nhật mới', 1, 3, '2023-08-15 00:48:32', '2023-08-15 00:48:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `slug`, `description`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', 'viet-nam', 'Mới cập nhật', 1, 1, '2023-08-14 09:37:46', '2023-08-15 02:00:54'),
(2, 'Âu - Mỹ', 'au-my', 'Mới cập nhật', 1, 2, '2023-08-14 09:37:57', '2023-08-15 02:00:54'),
(3, 'Trung Quốc', 'trung-quoc', 'Mới cập nhật', 1, 0, '2023-08-14 09:46:05', '2023-08-15 02:00:54'),
(4, 'Hàn Quốc', 'han-quoc', 'Mới cập nhật', 1, 3, '2023-08-14 09:46:14', '2023-08-14 10:21:12'),
(5, 'Nhật Bản', 'nhat-ban', 'Mới', 1, 4, '2023-08-15 00:51:08', '2023-08-15 00:51:08'),
(6, 'Thái Lan', 'thai-lan', 'Cập nhật', 1, NULL, '2023-10-01 23:15:37', '2023-10-01 23:15:37'),
(7, 'Hồng Kong', 'hong-kong', 'New', 1, NULL, '2023-10-01 23:17:37', '2023-10-01 23:17:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link_phim` text NOT NULL,
  `episode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `link_phim`, `episode`, `created_at`, `updated_at`) VALUES
(1, 7, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/bnEOW9HtZJM?si=Z__GOWVVLnTQigCB\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-09-30 08:36:52', '2023-09-30 15:05:49'),
(2, 4, '<iframe width=\"100%\" height=\"350\" src=\"https://www.youtube.com/embed/BkQVS2xzHjo?si=hi04SEt2U7cJ5nDl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-09-30 08:39:54', '2023-09-30 01:39:54'),
(3, 7, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/tH7Dj_LD1uQ?si=5tRTGYpSQX3rJTb0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 2, '2023-09-30 09:09:06', '2023-09-30 02:09:06'),
(4, 7, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/WgWEmvSYvh8?si=JseJrEaRCKMZIgCu\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 3, '2023-09-30 12:49:56', '2023-09-30 05:49:56'),
(5, 7, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/OAP-2Hk54N0?si=7S-LgvHvrF0ae5Ny\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 4, '2023-09-30 12:50:20', '2023-09-30 05:50:20'),
(6, 7, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/IleR4xlaU7M?si=ycuGRqx-2mBlH1iP\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 5, '2023-09-30 14:10:30', '2023-09-30 07:10:30'),
(7, 10, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://playhydrax.com/?v=OHVsiol1Z\"></iframe>', 1, '2023-09-30 15:18:16', '2023-10-02 08:23:47'),
(8, 1, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://playhydrax.com/?v=TPZUmvyAi\"></iframe>', 1, '2023-10-02 08:17:05', '2023-10-02 08:21:45'),
(9, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/ca8155f4d27f205953f9d3d7974bdd70\"></iframe>', 1, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(10, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/5ec91aac30eae62f4140325d09b9afd0\"></iframe>', 2, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(11, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/8b5040a8a5baf3e0e67386c2e3a9b903\"></iframe>', 3, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(12, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/da0d1111d2dc5d489242e60ebcbaf988\"></iframe>', 4, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(13, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/9c01802ddb981e6bcfbec0f0516b8e35\"></iframe>', 5, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(14, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/54a367d629152b720749e187b3eaa11b\"></iframe>', 6, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(15, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/24146db4eb48c718b84cae0a0799dcfc\"></iframe>', 7, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(16, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/afdec7005cc9f14302cd0474fd0f3c96\"></iframe>', 8, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(17, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/9f36407ead0629fc166f14dde7970f68\"></iframe>', 9, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(18, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/fd06b8ea02fe5b1c2496fe1700e9d16c\"></iframe>', 10, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(19, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/4588e674d3f0faf985047d4c3f13ed0d\"></iframe>', 11, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(20, 16, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://vie2.opstream7.com/share/a42a596fc71e17828440030074d15e74\"></iframe>', 12, '2023-10-02 23:39:04', '2023-10-02 23:39:04'),
(21, 17, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://aa.opstream6.com/share/096d3a817a272647f4ada2d6d733a8fb\"></iframe>', 1, '2023-10-02 23:44:34', '2023-10-02 23:44:34'),
(22, 18, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://kd.opstream3.com/share/39ec84a99221f244f1eb7e01c2231d38\"></iframe>', 1, '2023-10-02 23:52:35', '2023-10-02 23:52:35'),
(23, 19, '<iframe width=\"100%\" height=\"500px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"https://hd1080.opstream2.com/share/28fc2782ea7ef51c1104ccf7b9bea13d\"></iframe>', 1, '2023-10-02 23:54:05', '2023-10-02 23:54:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `slug`, `description`, `status`, `position`, `created_at`, `updated_at`) VALUES
(6, 'Hài Hước', 'hai-huoc', 'Mới cập nhật', 1, 0, '2023-08-14 10:02:24', '2023-08-14 10:02:24'),
(8, 'Chiến Tranh', 'chien-tranh', 'Mới cập nhật', 1, 1, '2023-08-14 10:05:53', '2023-08-14 10:05:53'),
(9, 'Hành động', 'hanh-dong', 'Mới cập nhật', 1, 2, '2023-08-14 10:06:19', '2023-08-14 10:06:19'),
(10, 'Tâm lý', 'tam-ly', 'Mới cập nhật', 1, 3, '2023-08-14 10:06:30', '2023-08-14 10:06:30'),
(13, 'Hoạt Hình', 'hoat-hinh', 'Mới cập nhật', 1, 4, '2023-08-14 10:10:45', '2023-08-14 10:10:45'),
(14, 'Võ thuật - kiếm hiệp', 'vo-thuat-kiem-hiep', 'Mới', 1, 5, '2023-08-15 00:48:56', '2023-08-15 00:48:56'),
(15, 'Kinh dị', 'kinh-di', 'Mới', 1, 6, '2023-08-15 00:49:06', '2023-08-15 00:49:06'),
(16, 'Văn hóa - tâm linh', 'van-hoa-tam-linh', 'Mới cập nhật', 1, 7, '2023-08-15 00:49:30', '2023-08-15 00:49:30'),
(17, 'Bí ẩn - siêu nhiên', 'bi-an-sieu-nhien', 'Mới cập nhật', 1, 8, '2023-08-15 00:49:55', '2023-08-15 00:49:55'),
(18, 'Khoa học - viễn tưởng', 'khoa-hoc-vien-tuong', 'Cập nhật', 1, 9, '2023-08-15 00:50:29', '2023-08-15 00:50:29'),
(19, 'Phim 18+', 'phim-18', 'Mới cập nhật !', 1, NULL, '2023-09-30 05:27:13', '2023-09-30 05:27:13'),
(20, 'Phiêu lưu', 'phieu-luu', 'Mới cập nhật !', 1, NULL, '2023-09-30 05:27:48', '2023-09-30 05:27:48'),
(21, 'Tình cảm', 'tinh-cam', 'Mới cập nhật !', 1, NULL, '2023-09-30 05:28:02', '2023-09-30 05:28:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `link_server`
--

CREATE TABLE `link_server` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `link_server`
--

INSERT INTO `link_server` (`id`, `title`, `description`, `status`) VALUES
(1, 'Link Vip Nhanh', '80k/thang', 1),
(2, 'Link Thường', 'Có quảng cáo xuất hiện !', 1),
(3, 'Link Hydrax', 'Nhanh', 1),
(4, 'Link Vimeo', 'Cũng nhanh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_29_172646_create_categories_table', 2),
(7, '2023_07_29_172657_create_genres_table', 2),
(8, '2023_07_29_172710_create_countries_table', 2),
(9, '2023_07_29_172716_create_movies_table', 2),
(10, '2023_07_29_172724_create_episodes_table', 2),
(11, '2023_09_29_152907_create_movie_genres_table', 3),
(12, '2023_10_02_141728_create_movie_categories_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name_eng` varchar(200) NOT NULL,
  `trailer` text DEFAULT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL,
  `thoi_luong` varchar(200) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `year` varchar(200) DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `tags` text NOT NULL,
  `season` varchar(50) DEFAULT '0',
  `sotap` varchar(11) NOT NULL DEFAULT '1',
  `thuocphim` varchar(100) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `name_eng`, `trailer`, `slug`, `description`, `status`, `image`, `category_id`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `thoi_luong`, `phude`, `year`, `topview`, `tags`, `season`, `sotap`, `thuocphim`, `views`, `created_at`, `updated_at`) VALUES
(1, 'NGƯỜI DƠI: VẠCH TRẦN SỰ THẬT', 'The batman', 'NLOp_6uPccQ', 'nguoi-doi-vach-tran-su-that', 'Người Dơi: Vạch Trần Sự Thật được triển khai theo hướng trinh thám với những màn đấu trí và cả cận chiến vô cùng máu me. Người Dơi của Robert Pattinson không phải là siêu anh hùng hoàn hảo mà vật lộn trong những tổn thương, sai lầm và sự kỳ thị của xã hội dành cho những gã tỷ phú lắm tiền.', 1, 'image/movie/1774279629427808_unnamed.jpg', 2, 1, 2, 1, 0, '180 phút', 0, '2022', 2, 'The Batman , Người dơi 2022 , Robert Pattinsion , \r\nngười dơi vạch trần sự thật ,\r\nthe batman', '0', '1', 'phimle', 3, '2023-08-15 00:17:16', '2023-10-02 14:44:19'),
(2, 'NGƯỜI KIẾN VÀ CHIẾN BINH ONG: THẾ GIỚI LƯỢNG TỬ', 'Antman and the Wasp : A world of billions', NULL, 'nguoi-kien-va-chien-binh-ong-the-gioi-luong-tu', 'Người Kiến và Chiến Binh Ong: Thế Giới Lượng Tử kể về Scott Lang và Hope Van Dyne trở lại tiếp tục cuộc phiêu lưu của họ với vai trò Người Kiến và Chiến binh Ong. Cùng với cha mẹ của Hope, họ sẽ có chuyến khám phá Lượng Tử Giới, gặp gỡ những sinh vật mới lạ và bắt đầu cuộc hành trình vào thế giới lượng tử.', 1, 'image/movie/1774280349231932_antman.jpg', 2, 9, 1, 1, 0, '178 phút', 0, '2023', 0, 'người kiến và chiến binh ong thế giới lượng tử\r\nantman and the wasp quantumania', '0', '1', 'phimle', 0, '2023-08-15 00:46:39', '2023-10-02 14:44:04'),
(3, 'LỜI NGUYỀN MA LAI', 'The curse of the skin', NULL, 'loi-nguyen-ma-lai', 'Lời Nguyền Ma Lai kể về Nina, ca sĩ trẻ của công ty Charasrak, thường xuyên gặp ác mộng, thấy mình biến thành Ma Lai. Kan là du học sinh và là con trai của người đứng đầu Charasrak. Kan hiểu lầm Nina là bồ nhí của bố nên luôn đối đầu với cô. Bỗng một ngày Nina thức dậy trong đêm và biến thành Ma Lai, cô sợ hãi và tìm cách chạy trốn. Vô tình biết được bí mật của Nina, Kan đã giúp cô tìm hiểu bí mật của bản thân cũng như nguyên nhân của kẻ thừa kế dòng máu Ma Lai.', 1, 'image/movie/1774280420062304_Loi-Nguyen-Tam-Da.jpg', 2, 1, 3, 1, 0, '200 phút', 1, '2018', 0, 'music and krasue\r\nlời nguyền ma lai', '0', '1', 'phimle', 0, '2023-08-15 00:47:46', '2023-10-02 14:43:52'),
(4, 'SÁT THỦ JOHN WICK 4', 'Killer John Wich 4', NULL, 'sat-thu-john-wick-4', 'Sát Thủ John Wick 4 là câu chuyện với cái giá phải trả ngày càng tăng, John Wick tham gia cuộc chiến chống lại High Table trên toàn cầu khi tìm kiếm những người chơi quyền lực nhất trong thế giới ngầm, từ New York qua Paris, Osaka đến cả Berlin.', 1, 'image/movie/1774280977578303_John-Wick-4.jpg', 5, 1, 1, 1, 0, '189 phút', 0, '2023', 1, 'john wick chapter 4\r\nsát thủ john wick 4', '0', '1', 'phimle', 0, '2023-08-15 00:56:38', '2023-10-02 14:43:38'),
(5, 'AVATAR: DÒNG CHẢY CỦA NƯỚC', 'Avatar : The way of water', NULL, 'avatar-dong-chay-cua-nuoc', 'Thế Thân: Dòng Chảy Của Nước lấy bối cảnh 10 năm sau những sự kiện xảy ra ở phần đầu tiên. Phim kể câu chuyện về gia đình mới của Jake Sully (Sam Worthington thủ vai) cùng những rắc rối theo sau và bi kịch họ phải chịu đựng khi phe loài người xâm lược hành tinh Pandora.', 1, 'image/movie/1774290260629393_avatar.jpg', 2, 1, 2, 1, 0, '250 phút', 0, '2021', 1, 'avatar dòng chảy của nước\r\nthế thân dòng chảy của nước\r\navatar the way of water', '0', '1', 'phimle', 0, '2023-08-15 03:24:11', '2023-10-02 14:44:49'),
(6, 'TÔI MỘNG GIỮA BAN NGÀY', 'You Are Desire (2023)', NULL, 'toi-mong-giua-ban-ngay', 'Tôi Mộng Giữa Ban Ngày kể về Sau khi cha mẹ ly hôn, Lâm Ngữ Kinh (Trang Đạt Phi) theo cha chuyển đến một thành phố xa lạ sinh sống. Đối mặt với gia đình mới, trường học mới, Lâm Ngữ Kinh vốn dĩ vô cùng thấp thỏm, cũng may mà mẹ kế và anh trai lại thật lòng quan tâm đến cô. Ở trường học, việc hòa nhập vào tập thể không khó như Lâm Ngữ Kinh tưởng tượng, cô nhanh chóng kết bạn với các bạn mới. Sự xuất hiện của cô cũng thay đổi người bạn cùng bàn Thẩm Quyện (Chu Dực Nhiên) – một học sinh lưu ban tính tình kỳ lạ – theo hướng không ngờ. Cuộc sống mới của Lâm Ngữ Kinh dần dần ổn định thì lúc này mẹ ruột của cô lại bắt cô trở về. Một năm sau, Lâm Ngữ Kinh lên đại học, gặp lại Thẩm Quyện. Mà bấy giờ Thẩm Quyện vẫn còn chìm trong nỗi đau người thân qua đời. Có Lâm Ngữ Kinh và những người bạn, Thẩm Quyện dần dần thoát khỏi mịt mờ, trở lại sàn đấu thuộc về bản thân. Và từ đây Lâm Ngữ Kinh tìm được phương hướng cho chính mình.', 1, 'image/movie/1774305711151723_unnamed (1).jpg', 4, 1, 4, 1, 4, '250 phút', 0, '2023', 1, 'TÔI MỘNG GIỮA BAN NGÀY', '4', '1', 'phimle', 0, '2023-08-15 07:29:46', '2023-10-02 14:43:00'),
(7, 'Kamen Rider OOO', 'Kamen Raidā Ōzu', 'CdXesX6mYUE', 'kamen-rider-ooo', 'Eiji Hino là một chàng trai thất nghiệp, không có gia đình lẫn ước mơ. Thứ duy nhất anh cố là chiếc quần lót. Khi những con quái vật hình thú được gọi là Greed thức tỉnh sau giấc ngủ dài 800 năm để tấn công con người, một cánh tay quái vật Greed gọi là Ankh (An-ku) đưa Eiji một cái thắt lưng và 3 Core Medal để chiến đấu với Yummy, chúng cho phép Eiji biến hình thành Kamen Rider OOO', 1, 'image/movie/1778450476444809_ooo.jpg', 5, 1, 1, 1, 0, '60 phút', 0, NULL, NULL, 'kamen rider ooo, kamen raidā ōzu Phim Kamen Rider OOO, Kamen Raidā Ōzu Vietsub, Kamen Rider OOO Trọn Bộ', '0', '49', 'phimbo', 3, '2023-09-30 08:29:02', '2023-10-02 14:42:44'),
(8, 'Đảo Hải Tặc', 'One Piece Live Action 2023', 'qJPebszgZuY', 'dao-hai-tac', 'One Piece - Đảo Hải Tặc | Vua Hải Tặc (1999) là một bộ phim hoạt hình nổi tiếng được dựa trên bộ truyện tranh cùng tên của tác giả Eiichiro Oda. Phim kể về cuộc hành trình của Monkey D. Luffy, một cậu bé có ước mơ trở thành Vua Hải Tặc và tìm kiếm kho báu One Piece - kho báu lớn nhất trên thế giới. Với sự tham gia của nhóm hải tặc Mũ Rơm, Luffy và đồng đội của mình chiến đấu với những kẻ thù nguy hiểm, khám phá các hòn đảo mới và gặp gỡ những nhân vật đa dạng và thú vị. Phim One Piece - Đảo Hải Tặc | Vua Hải Tặc (1999) mang đến cho khán giả những pha hành động mãn nhãn, những tình tiết hài hước và cảm xúc sâu sắc. Với hơn 900 tập phim, bộ phim này đã trở thành một trong những tác phẩm hoạt hình kinh điển và thu hút đông đảo fan hâm mộ trên toàn thế giới.', 1, 'image/movie/1778465392677529_One-Piece.jpg', 5, 1, 2, 1, 0, '45 phút /tập', 0, NULL, NULL, 'One Piece - Đảo Hải  , TặcVua Hải Tặc (1999)', '0', '8', 'phimbo', 0, '2023-09-30 12:26:07', '2023-10-02 14:42:31'),
(9, 'Người Nhện: Du Hành Vũ Trụ Nhện', 'Spider-Man: Across the Spider-Verse 2023', 'cqGjhVJWtEg', 'nguoi-nhen-du-hanh-vu-tru-nhen', 'Người Nhện: Du Hành Vũ Trụ Nhện – Spider-Man: Across the Spider-Verse (2023) Miles Morales tái xuất trong phần tiếp theo của bom tấn hoạt hình từng đoạt giải Oscar – Spider-Man: Across the Spider-Verse. Sau khi gặp lại Gwen Stacy, chàng Spider-Man thân thiện đến từ Brooklyn phải du hành qua đa vũ trụ và gặp một nhóm Người Nhện chịu trách nhiệm bảo vệ các thế giới song song.\r\n\r\nNhưng khi nhóm siêu anh hùng xung đột về cách xử lý một mối đe dọa mới, Miles buộc phải đọ sức với các Người Nhện khác và phải xác định lại ý nghĩa của việc trở thành một người hùng để có thể cứu những người cậu yêu thương nhất.', 1, 'image/movie/1778465782299013_Nguoi-Nhen-Du-Hanh-Vu-Tru-Nhen-2023.jpg', 2, 2, 1, 1, 0, '250 phút', 0, NULL, NULL, 'Người Nhện: Du Hành Vũ Trụ Nhện , Spiderman 2 , Du hành đa vũ trụ', '0', '1', 'phimle', 0, '2023-09-30 12:32:19', '2023-10-02 14:42:18'),
(10, 'The Flash', 'The Flash 2023', 'cvn0h6cuUPQ', 'the-flash', 'The Flash (2023) vì muốn cứu mẹ, Barry Allen tìm cách quay trở lại quá khứ tuy nhiên hành động của anh vô tình thiết lập một thế giới mới nơi thế lực ngoài hành tinh của tướng Zod quay trở lại và tìm cách tàn phá Trái Đất một lần nữa', 1, 'image/movie/1778465962314325_The-Flash-vietsub.jpg', 5, 2, 4, 1, 4, '200 phút', 0, NULL, NULL, 'Tia chớp 1 , tia chớp với người dơi , The flash 2023', '0', '1', 'phimle', 3, '2023-09-30 12:35:10', '2023-10-02 14:42:04'),
(11, 'Power Rangers: Vũ Trụ Cuồng Nộ', 'Power Rangers Cosmic Fury 2023', 'yZB48T9_DRE', 'power-rangers-vu-tru-cuong-no', 'Khi Chúa tể Zedd trở lại và mạnh mẽ hơn bao giờ hết, đội Vũ trụ cuồng nộ sẽ ra ngoài không gian để chiến đấu với hoàng đế của cái ác và cứu vũ trụ.', 1, 'image/movie/1778566452320619_sfRvYImG1sgYyP8RI1vcOZ3KpS2.jpg', 5, 1, 2, 1, 2, '250 phút', 1, NULL, NULL, 'Siêu nhân điện quang , kamenrider zed , power ranger', '0', '8', 'phimbo', 0, '2023-09-30 12:37:55', '2023-10-02 14:35:07'),
(12, 'Gia tộc Mục Dã', 'Gia tộc Mục Dã', '', 'gia-toc-muc-da', '', 1, 'https://img.ophim9.cc/uploads/movies/gia-toc-muc-da-poster.jpg', 5, 21, 7, 1, 0, '90 Phút/tập', 0, NULL, NULL, 'Gia tộc Mục Dã,gia-toc-muc-da', '0', '1', '1', 1, '2023-10-02 16:08:12', '2023-10-02 09:08:12'),
(13, 'Nhung Ke Nôi Loan', 'Insurgent', '', 'nhung-ke-noi-loan', '<p>Khi cô tìm kiếm các đồng minh và câu trả lời sau khi cuộc nổi dậy, Tris và Four đang chạy. Được săn lùng bởi Jeanine Matthews, thủ lĩnh của phe uyên bác, Tris và Four sẽ chạy đua với thời gian khi họ cố gắng tìm ra những gì từ bỏ cuộc sống đã hy sinh mạng sống của họ để bảo vệ, và tại sao các nhà lãnh đạo uyên bác sẽ làm bất cứ điều gì để ngăn chặn họ. Haunted bởi những lựa chọn trong quá khứ của mình nhưng tuyệt vọng để bảo vệ những người mà cô yêu, Tris phải đối mặt với một thách thức không thể xảy ra sau một thử thách khác khi cô mở khóa sự thật về quá khứ và cuối cùng là tương lai của thế giới.</p>', 1, 'https://img.ophim9.cc/uploads/movies/nhung-ke-noi-loan-poster.jpg', 5, 21, 7, 1, 0, 'Đang cập nhật', 0, NULL, NULL, 'Nhung Ke Nôi Loan,nhung-ke-noi-loan', '0', '1', '1', 1, '2023-10-02 16:13:06', '2023-10-02 09:13:06'),
(14, 'Xác Sống: Daryl Dixon', 'The Walking Dead: Daryl Dixon', 'https://www.youtube.com/watch?v=iTOaFootkSk', 'xac-song-daryl-dixon', '<p>Daryl dạt vào bờ biển Pháp và cố gắng tìm hiểu xem làm thế nào anh đến được đó và tại sao. Bộ phim theo dõi hành trình của anh qua một nước Pháp tan vỡ nhưng kiên cường khi anh hy vọng tìm được đường trở về nhà. Tuy nhiên, khi anh ấy thực hiện cuộc hành trình, những mối liên hệ mà anh ấy hình thành trên đường đi đã làm phức tạp thêm kế hoạch cuối cùng của anh ấy.</p>', 1, 'https://img.ophim9.cc/uploads/movies/xac-song-daryl-dixon-poster.jpg', 5, 21, 7, 1, 0, '60 phút/tập', 0, NULL, NULL, 'Xác Sống: Daryl Dixon,xac-song-daryl-dixon', '0', '6', '1', 1, '2023-10-02 16:14:26', '2023-10-02 09:14:26'),
(15, 'Hổ Hạc Yêu Sư Lục', 'Tiger and Crane', 'https://www.youtube.com/watch?v=f5u-cM-RVPE', 'ho-hac-yeu-su-luc', '<p>\"Hổ Hạc Yêu Sư Lục\" là bộ phim do Quách Hổ chỉ đạo với sự tham gia của các diễn viên Tương Long, Trương Lăng Hách, Vương Ngọc Thanh, Diệp Thanh, Hà Lam Đậu.\\nBộ phim được chuyển thể từ bộ truyện tranh \"Hổ Hạc Yêu Sư Lục\". Câu chuyện là góc nhìn của Hổ Tử và Hiểu Hiên về một nhóm thanh thiếu niên, vì ước mơ, vì tình yêu và trách nhiệm, trong nước mắt và tiếng cười để giải tỏa , vượt qua khó khăn giải cứu thiên hạ.</p><p>Cô bé mồ côi trên núi lạc quan và vui vẻ Hổ Tử đã vô tình nuốt chửng chí dương bảo vật xích châu. Cô còn gặp Kỳ Hiểu Hiên đội trưởng của quỷ vương triều lạnh lùng nghiêm nghị yêu sạch sẽ. Hai người trẻ với những tính cách rất khác nhau buộc phải đi chung con đường vì một viên xích châu, không những vậy họ còn quen với Triệu Hinh Đồng, Vương Vũ Thiên, Sơn Trà và những người khác. Bọn họ lúc đầu ghét bỏ phòng bị nhau đến bị thu hút bởi sự khác biệt và chớp nhoáng của nhau. Ở một phen trải qua nguy hiểm họ trở nên thân thiết hơn, để bảo hộ Hổ Tử, Kỳ Hiểu Hiên đã bị vào nhà giam. Để cứu Hiểu Hiên, Hổ Tử cùng các bạn cùng nhau tham gia chọn lựa, kết quả là họ đã tiết lộ âm mưu lớn của Quốc Ngự Yêu Sư và tìm ra chân tướng cuộc chiến giữa các yêu quái cách đây năm trăm năm. Bị áp chế năm trăm năm yêu quân rục rịch, ý đồ hủy diệt nhân gian. Ngay khi tham vọng của thế giới loài người và yêu quái sắp mang đến một thảm họa cho thế giới, một nhóm thanh niên đầy nhiệt huyết với ước mơ sẽ không ngần ngại hy sinh thân mình để giải cứu thế giới.</p>', 1, 'https://img.ophim9.cc/uploads/movies/ho-hac-yeu-su-luc-poster.jpg', 5, 21, 7, 1, 0, '45 phút/tập', 0, NULL, NULL, 'Hổ Hạc Yêu Sư Lục,ho-hac-yeu-su-luc', '0', '36', '1', 1, '2023-10-02 16:15:01', '2023-10-02 09:15:01'),
(16, 'Chuyện Tình Đấm Bốc', 'My Lovely Boxer', 'https://www.youtube.com/watch?v=lE4qA-6AD9Q', 'tinh-yeu-dam-boc', '<p>Võ sĩ thiên tài biến mất Kwon Sook và đặc vụ lạnh lùng Tae Young liều lĩnh chống lại nanh vuốt của bọn dàn xếp tỷ số.</p>', 1, 'https://img.ophim9.cc/uploads/movies/tinh-yeu-dam-boc-poster.jpg', 5, 21, 7, 1, 0, '65 phút/tập', 0, NULL, NULL, 'Chuyện Tình Đấm Bốc,tinh-yeu-dam-boc', '0', '12', '1', 2, '2023-10-03 06:36:25', '2023-10-02 23:39:27'),
(17, 'Ba Chàng Ngự Lâm 3', 'The Hangover Part III', '', 'ba-chang-ngu-lam-3', '<p>Trong hậu quả của cái chết của cha của Alan, Wolfpack quyết định đưa Alan để được đối xử với các vấn đề tinh thần của mình. Nhưng mọi thứ bắt đầu đi sai trên đường đến bệnh viện vì Wolfpack bị tấn công và Doug bị bắt cóc. Bây giờ họ phải tìm ông Chow một lần nữa để đầu hàng anh ta đến Gangster đã bắt cóc Doug để cứu anh ta.</p>', 1, 'https://img.ophim9.cc/uploads/movies/ba-chang-ngu-lam-3-poster.jpg', 5, 21, 7, 1, 0, 'Đang cập nhật', 0, NULL, NULL, 'Ba Chàng Ngự Lâm 3,ba-chang-ngu-lam-3', '0', '1', '1', 2, '2023-10-03 06:42:32', '2023-10-02 23:44:48'),
(18, 'Batman: Gotham Knight', 'Batman: Gotham Knight', '', 'batman-gotham-knight', '<p>Một tập hợp các sự kiện quan trọng đánh dấu cuộc đời của Bruce Wayne khi anh hành trình từ người mới bắt đầu đến Hiệp sĩ bóng đêm.</p>', 1, 'https://img.ophim9.cc/uploads/movies/batman-gotham-knight-poster.jpg', 5, 21, 7, 1, 0, '75 Phút', 0, NULL, NULL, 'Batman: Gotham Knight,batman-gotham-knight', '0', '1', '1', 2, '2023-10-03 06:52:24', '2023-10-02 23:52:47'),
(19, 'Batman Đại Chiến Superman: Ánh Sáng Công Lý', 'Batman v Superman: Dawn of Justice', '', 'batman-dai-chien-superman-anh-sang-cong-ly', '<p>Công dân tổng quát quan tâm đến việc có Superman trên hành tinh của họ và để \"Hiệp sĩ Dark\" - Batman - theo đuổi đường phố Gotham. Trong khi điều này đang xảy ra, một người dơi quyền lực-ám ảnh cố gắng tấn công Superman. Trong khi đó, Superman cố gắng giải quyết quyết định và Lex Luthor, Mastermind và Triệu phú phạm tội, cố gắng sử dụng những lợi thế của chính mình để chiến đấu với \"Người đàn ông của thép\".</p>', 1, 'image/movie/1778716864700913_https___i.cdn.tntdrama.com_assets_images_2022_09_BvSDoJ-1024x1536.jpg', 5, 21, 7, 1, 0, '', 0, NULL, NULL, 'Batman Đại Chiến Superman: Ánh Sáng Công Lý,batman-dai-chien-superman-anh-sang-cong-ly', '0', '1', '1', 2, '2023-10-03 06:53:59', '2023-10-03 00:03:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_categories`
--

CREATE TABLE `movie_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_categories`
--

INSERT INTO `movie_categories` (`id`, `movie_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, NULL, NULL),
(2, 11, 4, NULL, NULL),
(3, 11, 5, NULL, NULL),
(4, 11, 2, NULL, NULL),
(5, 10, 1, NULL, NULL),
(6, 10, 2, NULL, NULL),
(7, 10, 5, NULL, NULL),
(8, 9, 1, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 8, 1, NULL, NULL),
(11, 8, 4, NULL, NULL),
(12, 8, 5, NULL, NULL),
(13, 7, 4, NULL, NULL),
(14, 7, 5, NULL, NULL),
(15, 6, 1, NULL, NULL),
(16, 6, 4, NULL, NULL),
(17, 5, 1, NULL, NULL),
(18, 5, 2, NULL, NULL),
(20, 4, 2, NULL, NULL),
(21, 4, 5, NULL, NULL),
(22, 3, 1, NULL, NULL),
(23, 3, 2, NULL, NULL),
(24, 2, 2, NULL, NULL),
(25, 1, 1, NULL, NULL),
(26, 1, 2, NULL, NULL),
(27, 12, 5, NULL, NULL),
(28, 13, 5, NULL, NULL),
(29, 14, 5, NULL, NULL),
(30, 15, 5, NULL, NULL),
(31, 16, 5, NULL, NULL),
(32, 17, 5, NULL, NULL),
(33, 18, 5, NULL, NULL),
(34, 19, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(5, 5, 8, NULL, NULL),
(6, 5, 9, NULL, NULL),
(7, 5, 17, NULL, NULL),
(8, 5, 18, NULL, NULL),
(9, 4, 8, NULL, NULL),
(10, 4, 9, NULL, NULL),
(11, 4, 14, NULL, NULL),
(12, 3, 10, NULL, NULL),
(13, 3, 15, NULL, NULL),
(14, 3, 16, NULL, NULL),
(15, 3, 17, NULL, NULL),
(16, 2, 6, NULL, NULL),
(17, 2, 8, NULL, NULL),
(18, 2, 9, NULL, NULL),
(19, 1, 9, NULL, NULL),
(20, 1, 10, NULL, NULL),
(21, 1, 14, NULL, NULL),
(22, 1, 18, NULL, NULL),
(23, 6, 10, NULL, NULL),
(24, 6, 15, NULL, NULL),
(25, 6, 16, NULL, NULL),
(26, 6, 17, NULL, NULL),
(27, 7, 6, NULL, NULL),
(28, 7, 9, NULL, NULL),
(29, 7, 13, NULL, NULL),
(30, 7, 14, NULL, NULL),
(31, 7, 18, NULL, NULL),
(32, 8, 6, NULL, NULL),
(33, 8, 9, NULL, NULL),
(34, 8, 13, NULL, NULL),
(35, 8, 18, NULL, NULL),
(36, 9, 6, NULL, NULL),
(37, 9, 9, NULL, NULL),
(38, 9, 13, NULL, NULL),
(39, 9, 18, NULL, NULL),
(40, 9, 20, NULL, NULL),
(41, 10, 6, NULL, NULL),
(42, 10, 9, NULL, NULL),
(43, 10, 18, NULL, NULL),
(44, 10, 20, NULL, NULL),
(45, 11, 8, NULL, NULL),
(46, 11, 9, NULL, NULL),
(47, 11, 18, NULL, NULL),
(48, 12, 21, NULL, NULL),
(49, 13, 21, NULL, NULL),
(50, 14, 21, NULL, NULL),
(51, 15, 21, NULL, NULL),
(52, 16, 21, NULL, NULL),
(53, 17, 21, NULL, NULL),
(54, 18, 21, NULL, NULL),
(55, 19, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `movie_id`, `rating`, `ip_address`) VALUES
(1, 2, 5, '127.0.0.1'),
(2, 4, 5, '127.0.0.1'),
(3, 11, 4, '127.0.0.1'),
(4, 7, 5, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `google_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `google_id`, `created_at`, `updated_at`) VALUES
(1, 'Quang An Đặng', 'quangan010903@gmail.com', NULL, '$2y$10$fjGLoLULfQoFuZTnwGqoCu9kWh68OMQlG4eY.dx1eaJR6C9S/0tCC', NULL, '104418943724405525426', '2023-07-29 10:08:21', '2023-10-02 01:53:15'),
(2, 'Mẫn Đặng Quang', 'manshop2003@gmail.com', NULL, '$2y$10$XmPTQusoXeqEgTvk19FXSu5kQQGEgFwivGYX4kPccr/89RKO.pjfS', NULL, '104443436933071614864', '2023-10-02 01:58:57', '2023-10-02 01:58:57'),
(3, 'Nguyễn Ngọc Hân', 'handqkph25002@fpt.edu.vn', NULL, '$2y$10$uvw8mMGVscaUtnSDtYz6Ee75D5Dso90ipvlMPRQ6D4YNrp4MAOe.C', NULL, NULL, '2023-10-02 22:45:37', '2023-10-02 22:45:37');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `link_server`
--
ALTER TABLE `link_server`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_categories`
--
ALTER TABLE `movie_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `link_server`
--
ALTER TABLE `link_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `movie_categories`
--
ALTER TABLE `movie_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
