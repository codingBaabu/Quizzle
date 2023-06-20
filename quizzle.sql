-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 08:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzle`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `a_id` int(11) NOT NULL,
  `answers` varchar(255) NOT NULL,
  `right_answer_index` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`a_id`, `answers`, `right_answer_index`, `q_id`, `c_id`) VALUES
(412, 'To summarize the main points of a single article', 3, 121, 13),
(413, 'To critique and analyze the strengths and weaknesses of a book', 3, 121, 13),
(414, 'To provide an overview of existing research and knowledge on a topic', 3, 121, 13),
(415, 'Developing a research question', 1, 122, 13),
(416, 'Conducting a literature review', 1, 122, 13),
(417, 'Collecting data', 1, 122, 13),
(782, 'Quantitative data focuses on describing things', 2, 245, 13),
(783, 'Quantitative data deals with numbers', 2, 245, 13),
(784, 'They&#039;re the same thing', 2, 245, 13),
(785, 'Ethics should be based on the consequences of actions.', 3, 246, 12),
(786, 'Ethics should prioritize the happiness and pleasure of individuals.', 3, 246, 12),
(787, 'Ethics should be based on moral duties and principles.', 3, 246, 12),
(788, 'Divert the trolley to the track with one person, saving the five people.', 1, 247, 12),
(789, 'Allow the trolley to continue on its current path, resulting in the death of the five people.', 1, 247, 12),
(790, 'Refuse to make a choice and let fate decide the outcome.', 1, 247, 12),
(791, 'Utilitarianism focuses on maximizing overall happiness, while consequentialism focuses on the outcome of actions.', 1, 248, 12),
(792, 'Utilitarianism prioritizes individual rights and freedoms, while consequentialism focuses on the consequences of actions.', 1, 248, 12),
(793, 'Utilitarianism emphasizes personal moral virtues, while consequentialism emphasizes ethical rules and principles.', 1, 248, 12),
(794, 'A research-backed pitch to the panel on what you want to research long-term', 1, 249, 10),
(795, 'A comprehensive review of all literature in a given field', 1, 249, 10),
(796, 'A loose-idea of what you&#039;d like to research pitched to the council', 1, 249, 10),
(797, 'Find relevant titles, then read the abstract, then read the findings and conclusions', 1, 250, 10),
(798, 'Find relevant titles, then read  the intro, then read the findings and conclusions', 1, 250, 10),
(799, '?????? +1', 1, 250, 10),
(800, 'Hard', 3, 251, 10),
(801, 'Ez', 3, 251, 10),
(802, 'Taxing', 3, 251, 10),
(803, 'Soy hambre.', 2, 252, 9),
(804, 'Tengo hambre.', 2, 252, 9),
(805, 'Estoy hambre.', 2, 252, 9),
(806, '¿Cómo estás?', 1, 253, 9),
(807, '¿Qué haces?', 1, 253, 9),
(808, '¿Dónde vives?', 1, 253, 9),
(809, 'Hello.', 2, 254, 9),
(810, 'Goodbye.', 2, 254, 9),
(811, 'How are you?', 2, 254, 9),
(812, 'User Integration', 2, 255, 6),
(813, 'User Interface', 2, 255, 6),
(814, 'User Involvement', 2, 255, 6),
(815, 'Monitor', 3, 256, 6),
(816, 'Printer', 3, 256, 6),
(817, 'Keyboard', 3, 256, 6),
(818, 'Minimalism', 1, 257, 6),
(819, 'Complexity', 1, 257, 6),
(820, 'Inconsistency', 1, 257, 6),
(821, 'To encrypt data transmissions', 2, 258, 1),
(822, 'To prevent unauthorized access to a network', 2, 258, 1),
(823, 'To detect and remove malware', 2, 258, 1),
(824, 'Password', 3, 259, 1),
(825, 'Smart card', 3, 259, 1),
(826, 'Fingerprint', 3, 259, 1),
(827, 'To secure wireless networks', 2, 260, 1),
(828, 'To provide remote access to a private network', 2, 260, 1),
(829, 'To prevent phishing attacks', 2, 260, 1),
(830, ' Intrusion Detection System (IDS)', 3, 261, 1),
(831, 'Firewall', 3, 261, 1),
(832, 'Biometric door lock', 3, 261, 1),
(833, 'To identify and patch software vulnerabilities', 1, 262, 1),
(834, 'To encrypt sensitive data', 1, 262, 1),
(835, 'To monitor network traffic', 1, 262, 1),
(836, 'Fishing', 3, 263, 3),
(837, 'Hunting', 3, 263, 3),
(838, 'Cultivating', 3, 263, 3),
(839, 'To transfer files between computers', 3, 264, 2),
(840, 'To secure network communication', 3, 264, 2),
(841, 'To retrieve and display web pages', 3, 264, 2),
(842, 'To host websites', 3, 265, 2),
(843, 'To process server-side scripting', 3, 265, 2),
(844, 'To render and display web pages', 3, 265, 2),
(845, 'PHP', 3, 266, 2),
(846, 'Java', 3, 266, 2),
(847, 'JavaScript', 3, 266, 2),
(848, 'Cheddi Jagan', 1, 267, 3),
(849, 'Forbes Burnham', 1, 267, 3),
(850, 'David Granger', 1, 267, 3),
(851, 'Demerara Rebellion', 3, 268, 3),
(852, 'Independence Referendum', 3, 268, 3),
(853, 'Proclamation of the Cooperative Republic', 3, 268, 3),
(854, 'Arthur Chung', 2, 269, 3),
(855, 'Cuffy', 2, 269, 3),
(856, 'Walter Rodney', 2, 269, 3),
(857, 'Spain', 3, 270, 4),
(858, 'France', 3, 270, 4),
(859, 'England', 3, 270, 4),
(860, 'Haiti', 1, 271, 4),
(861, 'Jamaica', 1, 271, 4),
(862, 'Barbados', 1, 271, 4),
(863, 'Errol Barrow', 3, 272, 4),
(864, 'Michael Manley', 3, 272, 4),
(865, 'Eric Williams', 3, 272, 4),
(866, 'The visual appeal of a user interface', 3, 273, 6),
(867, 'The perceived ease of use of a system', 3, 273, 6),
(868, 'The potential actions and functions suggested by an object or interface', 3, 273, 6),
(869, 'To evaluate the aesthetic design of a user interface', 3, 274, 6),
(870, 'To assess the system&#039;s security measures', 3, 274, 6),
(871, 'To measure the effectiveness and efficiency of a system in achieving user goals', 3, 274, 6),
(872, 'Flow model', 1, 275, 6),
(873, 'Fitts&#039; Law', 1, 275, 6),
(874, 'Colour theory', 1, 275, 6),
(875, 'Hola', 1, 276, 9),
(876, 'Adiós', 1, 276, 9),
(877, 'Gracias', 1, 276, 9),
(878, 'Te amo', 1, 277, 9),
(879, 'Mucho gusto', 1, 277, 9),
(880, 'Por favor', 1, 277, 9),
(881, 'eres', 3, 278, 9),
(882, 'somos', 3, 278, 9),
(883, 'soy', 3, 278, 9),
(884, 'Introduction', 1, 279, 10),
(885, 'Literature Review', 1, 279, 10),
(886, 'Methodology', 1, 279, 10),
(887, 'To outline the research methodology', 2, 280, 10),
(888, 'To present previous research and theoretical frameworks', 2, 280, 10),
(889, 'To analyze the data collected', 2, 280, 10),
(890, 'Introduction', 3, 281, 10),
(891, 'Literature Review', 3, 281, 10),
(892, 'Methodology', 3, 281, 10),
(893, 'A theoretical research study conducted in a controlled laboratory setting', 2, 282, 11),
(894, 'A practical project that applies knowledge and skills to solve real-world problems', 2, 282, 11),
(895, 'A creative art project with no specific real-world application', 2, 282, 11),
(896, 'To contribute to theoretical knowledge', 3, 283, 11),
(897, 'To showcase artistic talent', 3, 283, 11),
(898, 'To solve practical problems and meet specific objectives', 3, 283, 11),
(899, 'To provide guidelines for ethical behavior in the computing profession', 1, 284, 12),
(900, 'To restrict access to computer systems', 1, 284, 12),
(901, 'To promote competition among computing professionals', 1, 284, 12),
(902, 'Protecting physical computer hardware from theft', 3, 285, 12),
(903, 'Safeguarding personal data stored on computers', 3, 285, 12),
(904, 'Preserving ownership rights over creative works and inventions', 3, 285, 12),
(905, 'Restricting access to computer networks', 2, 286, 12),
(906, 'Safeguarding personal information and data', 2, 286, 12),
(907, 'Ensuring high-speed internet connectivity', 2, 286, 12);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `q_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `votes` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comm_id`, `comment`, `q_id`, `u_id`, `date`, `timestamp`, `votes`, `time`) VALUES
(561, 'Keep in mind you dont gotta read the whole paper. I does read the abstract and findings first then decide if I want to continue', 121, 48, '2023-05-15', '2023-05-15 17:50:56', 0, '00:00:00'),
(580, 'Time is indeed important', 250, 57, '2023-06-06', '2023-06-06 22:54:13', 0, '00:00:00'),
(581, 'R.I.P to that person', 247, 57, '2023-06-06', '2023-06-06 23:07:32', 0, '00:00:00'),
(582, 'Informative', 262, 57, '2023-06-11', '2023-06-11 13:21:48', 0, '00:00:00'),
(583, 'That is true', 266, 63, '2023-06-11', '2023-06-11 14:24:33', 0, '00:00:00'),
(584, 'Agreed', 121, 57, '2023-06-11', '2023-06-11 14:26:17', 0, '00:00:00'),
(585, 'I argue that its Arthur Chung', 267, 57, '2023-06-11', '2023-06-11 14:38:09', 0, '00:00:00'),
(586, 'Got that wrong', 252, 57, '2023-06-11', '2023-06-11 15:05:31', 0, '00:00:00'),
(587, 'Duly noted', 283, 57, '2023-06-11', '2023-06-11 19:28:47', 0, '00:00:00'),
(588, 'Almost got it wrong', 263, 57, '2023-06-11', '2023-06-11 21:38:32', 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `name`, `fullName`) VALUES
(1, 'CSE3100', 'Information Assurance and Security'),
(2, 'CSE3101', 'Internet Computing II'),
(3, 'HST2105', 'Survey of Guyanese History I'),
(4, 'HST2104', 'Caribbean History'),
(6, 'CSE2202', 'Human Computer Interaction I'),
(9, 'SPA1203', 'Introduction to Spanish'),
(10, 'CSE4100', 'Undergraduate Research Project (Proposal)'),
(11, 'CSE4102', 'Applied Project'),
(12, 'CSE4201', 'Ethical and Professional Issues in Computing'),
(13, 'CSE4200', 'Undergraduate Research Project (Thesis)');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `c_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `questions`, `comment`, `c_id`, `votes`) VALUES
(121, 'What is the purpose of a literature review in academic writing?', 'A literature review is a critical analysis and synthesis of existing research and knowledge on a particular topic. Its purpose is to identify gaps in current knowledge, evaluate the quality of existing research, synthesize existing knowledge, and provide context for new research.', 13, 1),
(122, 'What is the first step in the research process?', 'Developing a research question is the first step in the research process because it sets the stage for the entire study.', 13, 3),
(245, 'What is the difference between qualitative and quantitative data?', 'Quantitative data involves numerical measurements and counts, focusing on objective and measurable aspects. On the other hand, qualitative data comprises non-numerical information, emphasizing descriptive and subjective characteristics.', 13, 0),
(246, 'According to Immanuel Kant, which of the following statements best represents his view on ethics?', ' Immanuel Kant is known for his deontological ethical theory, which emphasizes the importance of moral duties and principles. According to Kant, ethical actions are those performed out of a sense of duty and in accordance with universally applicable moral principles.', 12, 0),
(247, 'A runaway trolley is heading towards five people tied to the tracks. You have the option to divert the trolley to a different track where only one person is tied. Which is the utalitarian approach?', 'The most commonly discussed ethical response is diverting the trolley to the track with one person, sacrificing one life to save five lives. This response is based on the utilitarian perspective, which seeks to maximize overall happiness or well-being by minimizing harm and maximizing benefits.', 12, 0),
(248, 'What is the primary difference between utilitarianism and consequentialism?', 'Utilitarianism is an ethical theory that emphasizes maximizing overall happiness or well-being for the greatest number of people. Consequentialism, on the other hand, is a broader ethical framework that assesses the morality of actions based solely on their outcomes or consequences.', 12, 0),
(249, 'What best describes a preliminary proposal?', 'Your preliminary proposal will be brief, but it will touch on various research that identifies a common problem which you can then go crazy investigating. Be sure to keep your previous works as varied as possible.', 10, 0),
(250, 'What is a valid cheat-code for reading literature A LOT quicker?', 'Don&#039;t waste time reading an entire intro if it turns out the findings and results aren&#039;t useful to you (Abstract is enough). Heck, reading the methodology is entirely optional in most cases. If you find that the paper&#039;s findings interest you, you can always go back to previously skipped sections', 10, 0),
(251, 'What best describes the research process?', 'Research itself is not particularly complex. Instead, it&#039;s the extreme amount of information that you need to look into and the fact that there isn&#039;t a clear path to follow that makes it tough. The key is to stick with it. Keep reading, and consult with your supervisor often (wish ours responded)', 10, 0),
(252, 'Which of the following options correctly translates the English phrase &quot;I am hungry&quot; into Spanish?', 'Option A, &quot;Soy hambre,&quot; is incorrect as &quot;soy&quot; means &quot;I am&quot; and &quot;hambre&quot; means &quot;hunger.&quot; Option C, &quot;Estoy hambre,&quot; is also incorrect as &quot;estoy&quot; means &quot;I am&quot; (temporary state) and &quot;hambre&quot; means &quot;hunger.&quot; The correct translation uses the verb &quot;tener&quot; (to have) to express hunger in Spanish.', 9, 1),
(253, 'Which of the following options correctly translates the English phrase &quot;How are you?&quot; into Spanish?', 'It is important to note that greetings and introductions vary across different Spanish-speaking countries and regions, but &quot;¿Cómo estás?&quot; is a commonly used and understood way to ask &quot;How are you?&quot; in Spanish.', 9, 0),
(254, 'Choose the correct English translation for the Spanish greeting &quot;Adiós.&quot;', '', 9, 1),
(255, 'What does the acronym UI stand for in the context of human-computer interaction?', 'It refers to the visual and interactive elements through which a user interacts with a computer system or software. Option A, &quot;User Integration,&quot; and option C, &quot;User Involvement,&quot; are not correct interpretations of the UI acronym within this field.', 6, 1),
(256, 'Which of the following is an example of an input device used in human-computer interaction?', ' In the context of human-computer interaction, an input device is used to provide data or instructions to a computer system. A keyboard is a common example of an input device as it allows users to enter text, commands, and other inputs into the computer.', 6, 0),
(257, 'Which of the following principles is essential for designing user-friendly interfaces in human-computer interaction?', ' In human-computer interaction, designing user-friendly interfaces involves various principles to enhance usability. One crucial principle is minimalism, which emphasizes simplicity and reducing unnecessary complexity. ', 6, 1),
(258, 'What is the purpose of a firewall in information security?', 'A firewall is a security device or software that acts as a barrier between an internal network and the internet. Its primary purpose is to prevent unauthorized access to the network by monitoring and controlling incoming and outgoing network traffic based on predefined rules.', 1, 0),
(259, 'Which of the following is an example of a biometric authentication factor?', 'Biometric authentication factors utilize unique physical or behavioral characteristics of an individual to verify their identity. Fingerprint recognition is a common example of biometric authentication, while Passwords and smart cards are examples of knowledge-based and possession-based authenticati', 1, 0),
(260, 'What is the purpose of a VPN (Virtual Private Network) in information security?', 'A VPN allows users to securely access a private network over the internet. It creates an encrypted tunnel that protects data transmission, making it ideal for remote work and maintaining privacy.', 1, 0),
(261, 'Which of the following is an example of a physical security control?', 'A physical security control refers to measures taken to protect physical assets. A biometric door lock uses unique physical characteristics (e.g., fingerprints) to restrict access to a secure area.', 1, 0),
(262, 'What is the purpose of vulnerability scanning in information security?', 'Vulnerability scanning is a process of scanning systems and applications to identify potential security weaknesses. It helps organizations identify vulnerabilities and take corrective actions, such as applying patches and updates, to mitigate risks.', 1, 0),
(263, 'What are the amerindians best known for', '', 3, 0),
(264, 'What is the purpose of Hypertext Transfer Protocol (HTTP) in internet computing?', 'HTTP is the protocol used for fetching web resources, such as HTML documents, images, and videos, from web servers. It facilitates the communication between clients (web browsers) and servers to retrieve and display web content.', 2, 0),
(265, 'What is the role of a web browser in internet computing?', 'A web browser is a software application that allows users to access and view web pages. It retrieves web content from servers, interprets HTML, CSS, and JavaScript, and renders the content for display to the user.', 2, 1),
(266, 'Which of the following is an example of a client-side scripting language used in internet computing?', 'JavaScript is a popular client-side scripting language used to add interactivity and dynamic features to web pages. It runs directly in the user&#039;s web browser, allowing for real-time manipulation and interaction with the web page elements. PHP and Java, on the other hand, are server-side scripting', 2, 0),
(267, 'Who was the first President of Guyana?', 'Cheddi Jagan served as the first President of Guyana from 1992 to 1997. He was a prominent political figure, a co-founder of the People&#039;s Progressive Party, and played a significant role in Guyanese politics.', 3, -1),
(268, 'Which event led to Guyana gaining independence from British rule?', 'On February 23, 1970, Guyana officially became a Cooperative Republic, marking its independence from British rule. The Proclamation of the Cooperative Republic established the country&#039;s new political status.', 3, 0),
(269, 'Who is considered the national hero of Guyana?', 'Cuffy, also known as Kofi, is considered a national hero in Guyana. He was an enslaved African who led a major slave rebellion known as the Berbice Slave Uprising in 1763, fighting for freedom and equality.', 3, 1),
(270, 'Which European power colonized Jamaica in the 17th century?', 'Jamaica was colonized by England in the 17th century. The English captured the island from the Spanish in 1655 and established a permanent English presence in the Caribbean.', 4, 0),
(271, 'Which Caribbean country was the first to gain independence from European colonial rule?', 'Haiti was the first Caribbean country to gain independence from European colonial rule. It achieved independence from France in 1804 through a successful slave revolution led by Toussaint Louverture and Jean-Jacques Dessalines.', 4, 0),
(272, 'Which Caribbean leader played a significant role in the movement for regional integration and was the co-founder of the Caribbean Community and Common Market (CARICOM)?', 'Eric Williams, the first Prime Minister of Trinidad and Tobago, played a crucial role in the movement for regional integration in the Caribbean. He was one of the key architects and co-founders of CARICOM in 1973.', 4, 1),
(273, 'Which of the following best describes the concept of affordance in human-computer interaction?', 'Affordance refers to the perceived capabilities and potential interactions that an object or interface suggests to the user. It helps users understand how they can interact with a system or object based on its design cues.', 6, 0),
(274, 'What is the purpose of usability testing in human-computer interaction?', 'Usability testing involves evaluating a system or interface to assess its usability. It focuses on measuring how effectively and efficiently users can accomplish their goals when interacting with the system.', 6, 1),
(275, 'Which of the following is an example of a cognitive model used in human-computer interaction?', 'The flow model is a cognitive model used in human-computer interaction to describe the optimal mental state during an activity. It explains the concept of being fully immersed and engaged in a task, resulting in a satisfying user experience. While Fitts Law and colour theory are principles related to input device design and visual perception', 6, 0),
(276, 'Which of the following is the correct translation for &quot;hello&quot; in Spanish?', '&quot;Hola&quot; is the Spanish word for &quot;hello&quot; and is commonly used to greet someone. It is a basic and essential greeting phrase in Spanish.', 9, 0),
(277, 'What is the correct translation for the English sentence &quot;I love you&quot; in Spanish?', '&quot;Te amo&quot; is the correct translation for &quot;I love you&quot; in Spanish. It is an expression used to convey deep affection and romantic love towards someone.', 9, 0),
(278, 'Which verb conjugation is correct for the pronoun &quot;yo&quot; (I) in Spanish?', '&quot;Soy&quot; is the correct verb conjugation for the pronoun &quot;yo&quot; (I) in Spanish. It is the first-person singular form of the verb &quot;ser,&quot; meaning &quot;to be.&quot;', 9, 0),
(279, 'Which section of a research proposal provides an overview of the research problem, objectives, and significance?', 'The introduction section of a research proposal provides background information, states the research problem, and highlights the objectives and significance of the proposed study.', 10, 0),
(280, 'What is the purpose of the literature review in a research proposal?', 'The literature review in a research proposal presents an overview of relevant scholarly works and studies related to the research topic. It helps establish the research&#039;s context, identify gaps, and provide a theoretical foundation.', 10, 0),
(281, 'Which section of a research proposal describes the research design, data collection methods, and data analysis techniques?', ' The methodology section of a research proposal provides a detailed explanation of the research design, including the methods and techniques to be used for data collection and analysis. It outlines the research process and its implementation.', 10, 0),
(282, 'Which of the following best describes an applied project?', 'An applied project involves the practical application of knowledge, skills, and techniques to address real-world problems or challenges. It focuses on finding practical solutions and often involves hands-on implementation.', 11, 0),
(283, 'What is the primary goal of an applied project?', 'The main objective of an applied project is to address real-world issues or fulfill specific goals. It aims to provide practical solutions, implement interventions, or achieve specific outcomes in various domains.', 11, 1),
(284, 'What is the primary purpose of a code of ethics in computing?', 'A code of ethics in computing outlines the principles and standards of conduct for computing professionals. It serves as a guide for ethical decision-making and promotes responsible and ethical behavior in the field.', 12, 0),
(285, 'What is the concept of intellectual property in computing?', 'Intellectual property in computing refers to legal rights protecting original works, ideas, and inventions created in the field. It includes copyrights, patents, trademarks, and trade secrets.', 12, 1),
(286, 'What does the term &quot;privacy&quot; mean in the context of computing?', 'Privacy in computing refers to the protection and control of personal information and data. It involves measures to secure sensitive data, control its collection and usage, and respect individuals&#039; rights to privacy.', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `s_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`s_id`, `score`, `c_id`, `u_id`) VALUES
(19, 0, 1, 20),
(20, 0, 3, 20),
(22, 0, 4, 20),
(23, 0, 2, 20),
(25, 0, 5, 20),
(27, 0, 2, 50),
(28, 0, 1, 50),
(29, -1, 1, 48),
(30, 0, 1, 49),
(31, 0, 1, 51),
(32, 0, 1, 52),
(34, 0, 2, 48),
(35, 0, 6, 48),
(36, 0, 4, 48),
(37, 0, 3, 48),
(38, 2, 9, 48),
(39, 0, 1, 56),
(40, 0, 2, 57),
(41, 0, 1, 55),
(42, 6, 1, 57),
(43, 0, 3, 58),
(44, 0, 1, 60),
(45, 0, 2, 51),
(46, 0, 3, 51),
(47, 2, 13, 51),
(48, 0, 12, 51),
(49, 0, 11, 51),
(50, 2, 10, 51),
(51, 0, 9, 51),
(52, 0, 6, 51),
(53, 0, 4, 51),
(54, 3, 12, 57),
(55, 8, 3, 57),
(56, 3, 4, 57),
(57, 2, 10, 48),
(58, 8, 6, 57),
(59, 8, 9, 57),
(60, 8, 10, 57),
(61, 3, 11, 57),
(62, 7, 13, 57),
(63, 2, 13, 48),
(64, 5, 2, 63),
(65, -2, 1, 62);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `investments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `password`, `investments`) VALUES
(20, 'ravpanday95', 'test', 0),
(48, 'baabu', '$2y$10$AoPu3S6u1yMThnaxWtyEFuSLjFaZeeCgtrLPiABvk/XQdXiawPhQ.', 12),
(49, 'left-arm-of-baabu', '$2y$10$4XgIiEY.0cwFti4qlDx0vuYwUBQx4QUNuxrAbaRY3z.Aa/76uZVYG', 0),
(50, 'right-arm-of-baabu', '$2y$10$ltFpZadnQtH.RiEPuOLaSud3/Zt8fRkSjyBXBqYkUSI2tw3Za2/Ie', 0),
(51, 'chin-of-baabu', '$2y$10$cInBxygSBPUq1KzUMLv.P.nFZUx5Dy19iZUdnixiJ8BRypKHli2Qe', 6),
(52, 'left-leg-of-baabu', '$2y$10$xaH.gG5Iakwn4Nht.xbwJuSgVSgBRwVtxQOnFAIiLHULqv.kcZaXe', 0),
(53, 'head-of-baabu', '$2y$10$bPDXqNtj0W82vbpnojWjl.abNk1w5leSd3kBfxbxLxbOv1m5JbG.C', 0),
(54, 'supergoose', '$2y$10$2waty8pC4g4ukA5NAW1qcOldEcR1z.yMGXZqG02rYM.iryzOY9Jsy', 0),
(55, 'Daniel', '$2y$10$hJcefxWKjASg4kPWfvDt1e962Cfg4CnezLEHuLyYiHsWZfnUpaDl2', 1),
(56, 'Testing-baabu', '$2y$10$woIqQ.tTIL0OEJQnZRGfbuOaKQkhUG5stWX/cq8hxdgdGTJVFPA9q', 0),
(57, 'Nomu', '$2y$10$j9YRX62Beu.DoFveNDuS1.ql815rlxaGeUY4v70W9kPjFrtTMFzcy', 21),
(58, 'Skilly', '$2y$10$1qItG9ma2hn/P6tIg1s8pO8LsK10igwV7iiydc5DvwCSdoLWx.nt.', 0),
(59, 'running-baabu', '$2y$10$hbUXln0YUO1/sGe9gn4QZeDIaf/1aQ81EC44Kz2TAk2bKJaSy8uvS', 0),
(60, 'Dpanday', '$2y$10$/9LJea9hMUxYaQQ/HsS6GOLPb71K4vptMRLUmZfVxeBRE.J2gX51W', 0),
(61, 'Aidan ', '$2y$10$Oy50/7zOy0cYCofK5tzp3ucG5xg2ilO3EiRsd9QFD7gJ7icqxyNCa', 2),
(62, 'Owin', '$2y$10$QlLgV4zpri8ScZ.v999cRuINmZ8ZO.nKGuXfX0ar8at62MfkiNKjy', 1),
(63, 'pendulum', '$2y$10$BYSXKWbjy5oS147KEki39uaI7vv.4708ayGNc7F969QH34x5NFACO', 0),
(64, 'supermountaingoose', '$2y$10$lLRbNXgiKBwH5aEaesxK0.gH/FVUyXErZrAUckXdNVU0DeeontAhO', 3),
(65, 'achhkero', '$2y$10$lKYVL.FMGqzg9hN1FWT2NewkZWAewQutsTEa.p1vsZni0DDZM7rr.', 0),
(66, 'duckckurry', '$2y$10$Txdwk.ZB9Xlxpm4CCGSTGuGFqx9W6elv/SI9CA.9NxnS7uS5NXNga', 2),
(67, 'SuPrEmE_eNtItY', '$2y$10$pGuxdtW13R38Hiw2QxLTb.k3gsWQOh7vUewZxqjuwayjlXh5KB0HC', 0),
(68, 'Am_I_Real', '$2y$10$3ncHCgPknyasGqsG5uwZtOi.uEJrkm3x.BD2qlGfuK703dHBpVXk.', 0),
(69, 'Foresaken', '$2y$10$oxL5ZrVEF.Y3JZKuTKeIiO6XHu93KbGHKg5mSMMNhUVRuvmfnEAEm', 0),
(70, 'secret_channa', '$2y$10$IazIy/DZO51nbyxXZl5xBuU1EjtfPogGwEkucVFU.cV0e9G5NZ1Fa', 0),
(71, 'kingOfDumpings', '$2y$10$0mwe7IaNi1H6TT7HLYcpLujo/rJ53Pg21LwFOcZT2qEPPr882DBgi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE `voted` (
  `v_id` int(11) NOT NULL,
  `voted` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`v_id`, `voted`, `q_id`, `u_id`) VALUES
(2558, 1, 121, 48),
(2559, 0, 122, 48),
(2564, 0, 121, 57),
(2565, 2, 122, 57),
(2571, 0, 121, 56),
(2572, 0, 122, 56),
(2677, 0, 121, 60),
(2678, 0, 122, 60),
(2687, 2, 121, 51),
(2688, 2, 122, 51),
(2703, 0, 245, 51),
(2704, 0, 246, 51),
(2705, 0, 247, 51),
(2706, 0, 248, 51),
(2707, 0, 249, 51),
(2708, 0, 250, 51),
(2709, 0, 251, 51),
(2710, 0, 245, 57),
(2711, 0, 246, 57),
(2712, 0, 247, 57),
(2713, 0, 248, 57),
(2714, 0, 249, 57),
(2715, 0, 250, 57),
(2716, 0, 251, 57),
(2717, 2, 252, 57),
(2718, 0, 253, 57),
(2719, 2, 254, 57),
(2720, 2, 255, 57),
(2721, 0, 256, 57),
(2722, 2, 257, 57),
(2723, 0, 252, 51),
(2724, 0, 253, 51),
(2725, 0, 254, 51),
(2726, 0, 255, 51),
(2727, 0, 256, 51),
(2728, 0, 257, 51),
(2729, 0, 245, 48),
(2730, 0, 246, 48),
(2731, 0, 247, 48),
(2732, 0, 248, 48),
(2733, 0, 249, 48),
(2734, 0, 250, 48),
(2735, 0, 251, 48),
(2736, 0, 252, 48),
(2737, 0, 253, 48),
(2738, 0, 254, 48),
(2739, 0, 255, 48),
(2740, 0, 256, 48),
(2741, 0, 257, 48),
(2742, 0, 258, 51),
(2743, 0, 121, 62),
(2744, 0, 122, 62),
(2745, 0, 245, 62),
(2746, 0, 246, 62),
(2747, 0, 247, 62),
(2748, 0, 248, 62),
(2749, 0, 249, 62),
(2750, 0, 250, 62),
(2751, 0, 251, 62),
(2752, 0, 252, 62),
(2753, 0, 253, 62),
(2754, 0, 254, 62),
(2755, 0, 255, 62),
(2756, 0, 256, 62),
(2757, 0, 257, 62),
(2758, 0, 258, 62),
(2759, 0, 259, 62),
(2760, 0, 260, 62),
(2761, 0, 259, 51),
(2762, 0, 260, 51),
(2763, 0, 261, 51),
(2764, 0, 258, 57),
(2765, 0, 259, 57),
(2766, 0, 260, 57),
(2767, 0, 261, 57),
(2768, 0, 262, 57),
(2769, 0, 262, 51),
(2770, 0, 261, 62),
(2771, 0, 262, 62),
(2772, 0, 263, 62),
(2773, 0, 263, 57),
(2774, 0, 263, 51),
(2775, 0, 264, 51),
(2776, 0, 265, 51),
(2777, 0, 264, 57),
(2778, 2, 265, 57),
(2779, 0, 266, 57),
(2780, 1, 267, 57),
(2781, 0, 268, 57),
(2782, 2, 269, 57),
(2783, 0, 270, 57),
(2784, 0, 271, 57),
(2785, 2, 272, 57),
(2786, 0, 258, 48),
(2787, 0, 259, 48),
(2788, 0, 260, 48),
(2789, 0, 261, 48),
(2790, 0, 262, 48),
(2791, 0, 263, 48),
(2792, 0, 264, 48),
(2793, 0, 265, 48),
(2794, 0, 266, 48),
(2795, 0, 267, 48),
(2796, 0, 268, 48),
(2797, 0, 269, 48),
(2798, 0, 270, 48),
(2799, 0, 271, 48),
(2800, 0, 272, 48),
(2801, 0, 266, 51),
(2802, 0, 267, 51),
(2803, 0, 268, 51),
(2804, 0, 269, 51),
(2805, 0, 270, 51),
(2806, 0, 271, 51),
(2807, 0, 272, 51),
(2808, 0, 273, 48),
(2809, 0, 274, 48),
(2810, 0, 273, 51),
(2811, 0, 274, 51),
(2812, 0, 273, 57),
(2813, 2, 274, 57),
(2814, 0, 275, 57),
(2815, 0, 275, 48),
(2816, 0, 276, 57),
(2817, 0, 277, 57),
(2818, 0, 278, 57),
(2819, 0, 279, 57),
(2820, 0, 280, 57),
(2821, 0, 281, 57),
(2822, 0, 275, 51),
(2823, 0, 276, 51),
(2824, 0, 277, 51),
(2825, 0, 278, 51),
(2826, 0, 279, 51),
(2827, 0, 280, 51),
(2828, 0, 281, 51),
(2829, 0, 282, 57),
(2830, 2, 283, 57),
(2831, 0, 284, 57),
(2832, 2, 285, 57),
(2833, 0, 286, 57),
(2834, 0, 282, 51),
(2835, 0, 283, 51),
(2836, 0, 284, 51),
(2837, 0, 285, 51),
(2838, 0, 286, 51),
(2839, 0, 276, 48),
(2840, 0, 277, 48),
(2841, 0, 278, 48),
(2842, 0, 279, 48),
(2843, 0, 280, 48),
(2844, 0, 281, 48),
(2845, 0, 282, 48),
(2846, 0, 283, 48),
(2847, 0, 284, 48),
(2848, 0, 285, 48),
(2849, 0, 286, 48),
(2850, 0, 121, 63),
(2851, 0, 122, 63),
(2852, 0, 245, 63),
(2853, 0, 246, 63),
(2854, 0, 247, 63),
(2855, 0, 248, 63),
(2856, 0, 249, 63),
(2857, 0, 250, 63),
(2858, 0, 251, 63),
(2859, 0, 252, 63),
(2860, 0, 253, 63),
(2861, 0, 254, 63),
(2862, 0, 255, 63),
(2863, 0, 256, 63),
(2864, 0, 257, 63),
(2865, 0, 258, 63),
(2866, 0, 259, 63),
(2867, 0, 260, 63),
(2868, 0, 261, 63),
(2869, 0, 262, 63),
(2870, 0, 263, 63),
(2871, 0, 264, 63),
(2872, 0, 265, 63),
(2873, 0, 266, 63),
(2874, 0, 267, 63),
(2875, 0, 268, 63),
(2876, 0, 269, 63),
(2877, 0, 270, 63),
(2878, 0, 271, 63),
(2879, 0, 272, 63),
(2880, 0, 273, 63),
(2881, 0, 274, 63),
(2882, 0, 275, 63),
(2883, 0, 276, 63),
(2884, 0, 277, 63),
(2885, 0, 278, 63),
(2886, 0, 279, 63),
(2887, 0, 280, 63),
(2888, 0, 281, 63),
(2889, 0, 282, 63),
(2890, 0, 283, 63),
(2891, 0, 284, 63),
(2892, 0, 285, 63),
(2893, 0, 286, 63),
(2982, 0, 264, 62),
(2983, 0, 265, 62),
(2984, 0, 266, 62),
(2985, 0, 267, 62),
(2986, 0, 268, 62),
(2987, 0, 269, 62),
(2988, 0, 270, 62),
(2989, 0, 271, 62),
(2990, 0, 272, 62),
(2991, 0, 273, 62),
(2992, 0, 274, 62),
(2993, 0, 275, 62),
(2994, 0, 276, 62),
(2995, 0, 277, 62),
(2996, 0, 278, 62),
(2997, 0, 279, 62),
(2998, 0, 280, 62),
(2999, 0, 281, 62),
(3000, 0, 282, 62),
(3001, 0, 283, 62),
(3002, 0, 284, 62),
(3003, 0, 285, 62),
(3004, 0, 286, 62);

-- --------------------------------------------------------

--
-- Table structure for table `votedcomments`
--

CREATE TABLE `votedcomments` (
  `vc-id` int(11) NOT NULL,
  `voted` int(11) NOT NULL,
  `comm_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votedcomments`
--

INSERT INTO `votedcomments` (`vc-id`, `voted`, `comm_id`, `u_id`, `q_id`) VALUES
(834, 0, 561, 48, 121),
(836, 0, 561, 57, 121),
(843, 0, 561, 56, 121),
(862, 0, 561, 60, 121),
(865, 0, 561, 51, 121),
(871, 0, 561, 62, 121),
(872, 0, 580, 57, 250),
(873, 0, 580, 51, 250),
(874, 0, 581, 57, 247),
(875, 0, 581, 51, 247),
(876, 0, 580, 48, 250),
(877, 0, 581, 48, 247),
(878, 0, 561, 63, 121),
(879, 0, 580, 63, 250),
(880, 0, 581, 63, 247),
(887, 0, 582, 48, 262),
(888, 0, 582, 57, 262),
(889, 0, 582, 63, 262),
(890, 0, 583, 57, 266),
(891, 0, 584, 57, 121),
(892, 0, 585, 57, 267),
(893, 0, 586, 57, 252),
(894, 0, 583, 63, 266),
(895, 0, 584, 63, 121),
(896, 0, 585, 63, 267),
(897, 0, 586, 63, 252),
(898, 0, 580, 62, 250),
(899, 0, 581, 62, 247),
(900, 0, 582, 62, 262),
(901, 0, 583, 62, 266),
(902, 0, 584, 62, 121),
(903, 0, 585, 62, 267),
(904, 0, 586, 62, 252),
(905, 0, 587, 57, 283),
(906, 0, 588, 57, 263),
(907, 0, 583, 48, 266),
(908, 0, 584, 48, 121),
(909, 0, 585, 48, 267),
(910, 0, 586, 48, 252),
(911, 0, 587, 48, 283),
(912, 0, 588, 48, 263);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `votedcomments`
--
ALTER TABLE `votedcomments`
  ADD PRIMARY KEY (`vc-id`),
  ADD KEY `comm-id` (`comm_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `q_id` (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=908;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `voted`
--
ALTER TABLE `voted`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3093;

--
-- AUTO_INCREMENT for table `votedcomments`
--
ALTER TABLE `votedcomments`
  MODIFY `vc-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=933;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `courses` (`c_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `voted`
--
ALTER TABLE `voted`
  ADD CONSTRAINT `voted_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`),
  ADD CONSTRAINT `voted_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `votedcomments`
--
ALTER TABLE `votedcomments`
  ADD CONSTRAINT `votedcomments_ibfk_1` FOREIGN KEY (`comm_id`) REFERENCES `comments` (`comm_id`),
  ADD CONSTRAINT `votedcomments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `votedcomments_ibfk_3` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
