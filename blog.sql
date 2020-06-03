-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 jun 2020 om 14:05
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `comment`, `created`, `deleted`, `postId`) VALUES
(1, 7, 'Ik dacht dat ik belangrijk was', '2020-06-03 11:55:12', 0, 10),
(2, 7, 'je hebt een spelling fout op regel 5', '2020-06-03 11:56:01', 0, 6),
(3, 7, 'Het is covin-19 niet corona!', '2020-06-03 11:56:31', 0, 1),
(4, 4, 'ik ging altijd terug naar school zelf als ik er geen zin in had', '2020-06-03 11:57:03', 0, 11),
(5, 4, 'Johan ben je een meisje?', '2020-06-03 11:57:24', 0, 14),
(6, 4, 'had ik maak een kalender', '2020-06-03 11:57:52', 0, 9),
(7, 4, 'Piet ik denk dat jij een robot bent', '2020-06-03 11:59:02', 0, 4),
(8, 4, 'HET IS COVIN-19 NIET CORONA', '2020-06-03 11:59:24', 0, 3),
(9, 4, 'Dat zeg ik toch', '2020-06-03 11:59:36', 0, 1),
(10, 4, 'hahaha je wordt een oude man daar gaat je leven', '2020-06-03 12:00:17', 0, 7),
(11, 3, 'ik denk dat hij bi is', '2020-06-03 12:00:48', 0, 14),
(12, 3, 'ik ook toevallig, ging jij ook naar pieter groen?', '2020-06-03 12:01:07', 0, 11),
(13, 3, 'was dat maar waar', '2020-06-03 12:01:23', 0, 10),
(14, 3, 'had ik maar jouw ;P', '2020-06-03 12:01:39', 0, 9),
(15, 3, 'Fred jij zoek je ruzie?', '2020-06-03 12:02:07', 0, 4),
(16, 3, 'Fred jij zoek echt ruzie', '2020-06-03 12:02:24', 0, 7),
(17, 3, 'FRED JIJ BENT ECHT HEEL IRRITANT', '2020-06-03 12:02:37', 0, 3),
(18, 3, 'leuke post', '2020-06-03 12:02:47', 0, 2),
(19, 3, 'jullie zijn gwn ho**', '2020-06-03 12:03:06', 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` tinytext NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`postId`, `title`, `description`, `content`, `date`, `userId`, `deleted`) VALUES
(1, 'Wellness in the Time of Corona', 'The following tips, tools, and resources are things that have brought me joy during #quarantinelife. I wanted to share them in the hope that maybe something here will resonate with someone else, too.', 'I have known about Fitness Blender for several years. Kelly and Daniel have wonderful (free!) virtual workouts that include low impact, high impact (such as HIIT), yoga, and weights. You can filter the workouts based on time, intensity level, and type of workout. I always choose “no equipment” since I don’t have a fully equipped gym in my house.\r\n\r\nLet me tell you—they will make you sweat! One of my favorite ways to connect during quarantine and get a workout in has been to call a friend over Zoom and use the “screen sharing” feature to show a video from Fitness Blender. We’ve encouraged each other during the hard parts, chatted during the “water break,” and then caught up afterward until we both decided it was time to shower.\r\n\r\nScheduling in movement during my day has been a great way to feel refreshed and energized before returning to work or after a long session of reading and writing. (The Learning Center’s handout on movement and learning backs me up on this!)', '2020-06-03 11:37:40', 1, 0),
(2, 'My Many Methods of Organization', 'By a fellow UNC student', 'When I first came to college, I found it challenging to balance various elements of my life. From class assignments and club meetings to my work schedule and meet ups with friends, it didn’t take long before I started feeling very overwhelmed. I started thinking: How am I supposed to stay on top of all of these deadlines? How can I figure out when I’ll have time to fit everything in my schedule? Eventually I developed a three-part system to keep myself organized.\r\n\r\n\r\nThe beginning of a new school year sparks my excitement for picking out a fresh calendar. I usually find a cheap planner with a monthly calendar view at Walmart to start the year off right. Whenever I get a new syllabus during FWOC, I take some time over the weekend to write in all of my major assignment due dates for the entire semester. However, sometimes due dates change (as I have seen this semester due to the impact of COVID-19), so using whiteout, an eraser, or even just a pen (like I normally do) helps me make those changes. My planner gives me an overview of my entire academic semester and helps me coordinate times for club meetings and my work schedule. However, some of my jobs and clubs use Google Calendar to mark their events for the month, so using a combination of handwritten and digital calendars is helpful for me.', '2020-06-03 11:39:34', 1, 0),
(3, 'How I Write and Learn: Love in the Time of Corona', 'By Lea', 'nother day of quarantine means another day of enforcing structure, something that I am sorely missing since UNC’s shift to online classes and the state’s subsequent stay-at-home order. Like many of my peers, I am struggling to maintain work-life separation and am mourning the loss of the people and patterns that would usually give my days some direction. However, I have found that I am leaning even more on those that I care about not only to help me cope but also to help me stay motivated.\r\n\r\nBeing separated from my classmates, my students at the Learning Center, and my friends and family has been more difficult than I ever expected. But these same social connections are helping me survive and thrive in our new environment. Seeing my classmates’ faces during our online classes, seeing my students during their Zoom appointments, and finding new ways to spend time with friends from a distance are all integral to my new normal.\r\n\r\nAttending online classes (with my video on) motivates me to do my normal morning routine: shower, get ready, eat breakfast, and prep my workspace. Planning video chats in the evenings to catch up with friends who moved back home to take care of their parents makes me plan my work time accordingly. Playing digital Dungeons and Dragons or party games with friends on the weekends gives me something to look forward to during the week and differentiates the days from one another. Lunchtime phone calls with my boyfriend, who is working and attending grad school in Charlotte while I’m in Durham, gives us time to catch up and encourage each other as we both face our upcoming assignments and exams.', '2020-06-03 11:41:20', 2, 0),
(4, 'Taking Life Week by Week', 'Like many other students, I’ve recently had to move back home. While I was happy to be reunited with my cat, all the upheaval (and my inability to go get work done at Davis) has made it difficult for me to stay as organized and on top of my work as I us', 'I’ve been using Trello to keep track of all my work and assignments since the start of spring semester, but I began to think that something similar to a traditional planner might also help me keep track of what needs to be done and when it needs to be done. So, I turned to the Learning Center’s weekly planners.\r\n\r\nThese planners can be found on the Learning Center’s tips and tools page, under “Own Your Calendar.” The Learning Center has calendars for finals, the end of spring semester, and spring semester as a whole, but I was most interested in the three titled “Weekly Calendar.” These three go from broad (the block calendar) to detailed (the thirty-minute calendar). I decided to try out the calendar with thirty-minute intervals, as I felt it would give me a little more flexibility when planning my schedule.\r\n\r\nThis is what my planner looked like after I finished filling it out (note: it actually extends all the way to 1 AM, so anyone who prefers working at night is in luck). To decrease the amount of text I would need to cram in each block, I decided to give each of my classes and commitments a unique color, which I then made a key for so that it would be easy to remember. After completing a block, I used the strikethrough option in Microsoft Word to cross it out. For anyone who prefers a more traditional calendar, these templates can also be printed. I prefer electronic versions, as I tend to leave papers lying around in random places, only to find them a month later.', '2020-06-03 11:42:29', 2, 0),
(5, 'Tales from the Home Office: The Uncluttering', 'a Writing Coach', 'Like most folks, I have a lot of projects going on. And like most folks, I have projects that are all at various stages of development, degrees of interest personally, and levels of importance professionally and financially. In addition to my work at the Writing Center, I’m taking classes at the School of Information and Library Science, working with government documents at Duke University Libraries, helping two professors with their respective book projects, trying to navigate what a gig looks like as a quarantined musician, and trying to figure out how the heck Facebook Live works so that the venue I work for can host musicians virtually. And you know, trying to eat and sleep occasionally. It’s a delicate balance.\r\n\r\nPre-quarantine, my chaotic schedule was kind of helpful. I just did whatever I was supposed to do at any given time and place so that things got done, ideally somewhere around the time that they were supposed to. This schedule involved frantically running around, writing papers in strange places at strange hours, and frequently checking Google Calendar. The challenge of showing up in the right places at the right times and keeping deadlines straight meant that I never really had much choice in terms of where my work happened.', '2020-06-03 11:43:46', 3, 0),
(6, 'A Day in the Life: Grad Student Edition', 'a UNC grad student', 'Hi! I’m a Ph.D. student at UNC, and I’m here to write about how I’ve been trying (sometimes successfully, sometimes unsuccessfully) to stay productive as a work-from-home student. I’m in the dissertating phase of graduate school, which means I am no longer taking classes. As a result, most of my work had already been self-motivated before entering quarantine. For me, acclimating to working in isolation has been mostly about protecting the routine I had before and finding ways to keep support networks alive while I’m not able to leave the house.\r\n\r\n8:30 AM:\r\n\r\nBy this time, I’ve been snoozing my alarm for 20-30 minutes while my brain makes peace with the fact that I have to get up. The mornings are the most treacherous time of the day for me. If I don’t have a specific accountability mechanism built into my mornings, whether a coffee date, a morning meeting, a class, or something else that I literally have to show up for, I’m liable to give up right away and sleep until noon.', '2020-06-03 11:44:12', 3, 0),
(7, 'An Open Letter to the Class of 2020', 'a 2020 senior', 'Wow! If you told me in January that we would be completing the Spring 2020 semester remotely, I would’ve thought you were joking. But, here we are. As a senior, I feel devastated. Many other people are experiencing losses large and small at this time, but all losses are legitimate. So, I thought I would write this honest blog post about how I’m coping with being a senior during the COVID-19 Pandemic.\r\n\r\nWhen the COVID-19 events began during Spring Break, I reacted to the pandemic by going through the five stages of grief.\r\n\r\nA still frame of Elle Woods from the film Legally Blonde eating chocolate in bed with the caption, \"Liar!\"\r\n\r\nFirst, I denied that a pandemic was occuring. My family, friends, and colleagues were all discussing COVID-19 and the possibility that classes might be put online, but I wouldn’t listen. I pretended nothing was going on in the world. After receiving The Email on Wednesday, March 11, I was forced to confront the pandemic and entered the anger stage.\r\n\r\nAfter receiving the online classes announcement, I vented to my close friend for a while. I was so mad that the university was taking away the rest of my senior year for a little virus. At the time, I was not taking the virus seriously. Once I had cooled off, I began bargaining, hoping life would change for only a short time.\r\nDuring my days of bargaining, I chatted with family and friends, constantly probing them to confirm my dreams of school returning to normal operations. I reassured myself that I would be back on campus after a week of online classes. Staying home for a week was a minor life interruption that I could handle. My hopes crashed when I received my move-out notice. With all these changes at UNC, I knew online classes would be permanent, and I entered my depression stage.', '2020-06-03 11:45:46', 4, 0),
(8, 'A Day in the Life: A New Routine', 'New Routine makes you a whole different life..', 'My alarm goes off, which cues Cappuccino, one of my cats, to commence her morning ritual of meowing very, very loudly until I get out of bed. She has officially made it to where the “snooze” button is no longer an option for me. It’s the same sort of wake-up call I’ve had each morning of this school year, so not much feels different at first on this Tuesday morning.\r\n\r\nI go to the kitchen, feed Cappuccino and her brother, Alpuccino, their kibbles, and immediately make coffee for myself and pour my cereal while stretching my arms and legs. This is the same routine as always, too. I read The New York Times on my phone while munching my breakfast, as usual, and reflect on how many COVID-19-related articles there are to read. I scroll through some of them.\r\nA photo of a desk with a laptop, coffee mug, calendar, and various images and office supplies to illustrate a work-from-home space.\r\n7:45 AM:\r\n\r\nStill waiting for the caffeine to kick in, I head over to the room designated as my office, which is right by our kitchen, and get things set up for my English 105 class. I’m teaching English 105 right now as I work on my doctorate in English, and, let me say, teaching online has certainly been quite a challenge. I very much miss being in the classroom with my students! Normally at this time I would be walking to Greenlaw, reflecting on key points for our class discussion, waking up to the sounds of traffic and other students heading to their early morning classes. But today at this time I’m still in my pajamas trying to make sure the online activities are up before 8 a.m. and that I’m ready to talk about some Elizabeth Bishop poems.\r\n\r\nBefore I start the Zoom session, I change my clothes and reflect on how weird it is to change to prepare for a Zoom class session.', '2020-06-03 11:47:05', 4, 0),
(9, 'How I Use Calendars', 'Calendars and Calendars Ive been using one my whole life', 'I wholeheartedly believe that the perfect calendar doesn’t exist. Because the “best calendar” is so subjective, the Learning Center has a whole handout on just using calendars and planners! It took me a few years of trial and error to learn that a combination of paper and electronic calendars works best for me. This system doesn’t need to be complicated. In my case, I use Google Calendar to figure out where I need to be (as well as any recurring reminders) and a paper calendar for what I need to do.\r\n\r\nWhere I need to be (and recurring reminders)\r\n\r\nGoogle Calendar works well for telling me when I need to go to class, work, or extracurricular activities. I also add recurring reminders, such as paying my bills once a month or taking medication. Even though I could use a different online calendar, I prefer Google Calendar for several reasons:', '2020-06-03 11:48:13', 5, 0),
(10, 'The Important Things', 'This has to be very very important because I used very twice', 'In Rachel’s day-in-the-life blog post, she reminded us: We’re all in this together.\r\n\r\nI want to pick up there. “We’re all in this together” is so very true even as it seems we are so very far apart, tucked into our various new paths. It’s hard for us to see this though.\r\n\r\nEven in the before times, pre-COVID-19 and quarantine, I often wished I could give the students I worked with at the Learning Center a peak at the bird’s eye view I had through coaching: we are all going through a lot. Like, so very much. All of the time.\r\n\r\nI am going to share now what I so often wanted to tell my students in our sessions. The students I’ve had the privilege of coaching or teaching have gone through so much difficulty, and the reasons might be vastly different. The outcomes, however, are so, so, so often the same: an experience of heightened stress throughout the body, freezing up, an experience of anxiety-related procrastination, losing a sense of time or even the value of keeping track.\r\n\r\nThis is so normal it’s astounding. Each student comes in wanting to know why they—in particular—”can’t” do x or y thing. Honestly, the whys are vast. We each have such rich, individual worlds. The whys do matter. But as a person who has had hundreds of hours of experience coaching and thousands of hours teaching, the results of those very individual life experiences, the results of all those whys, are so incredibly similar and normal.\r\n\r\nIt is normal to get stuck or hide or go numb. It is normal to not have forward movement. It’s also normal to get busy with other things instead, and focus on a different type of productivity that fills up the hours.\r\nThat hasn’t gotten easier with a global health crisis. Everyone I know who can be home is following the shelter order to stay home. Many are dealing with crises that predated quarantine: an immunocompromising illness, a hurt or sick family member, a difficult home life with family or a partner, economic hardship, or any number of other personal disasters', '2020-06-03 11:49:10', 5, 0),
(11, 'Getting Back to It', 'It\'s hard to let off a habith if you are use to it', 'Every night before going to bed, I write down two things I’m grateful for that day in a small, smooth notebook gifted to me by my German “sister.” Growing up as an only child, I relished the year that my family hosted an exchange student from Bielefeld, Germany. Stefanie has always encouraged my writing practice by supplying me with numerous notebooks and pens over the years. This one was supposed to be for documenting trips and travels (we had always imagined taking one together), but, since traveling is far from my mind these days, it has served as the perfect gratitude journal. I am an on-again, off-again journal writer, but somehow this simple practice has stuck—well, except for last night when my partner and I rolled into bed after watching too many episodes of Tiger King. I find that exceptions to the rule don’t in and of themselves sabotage habits and routines, it’s “the getting back to” that’s important.\r\n\r\nA photo of a blue pen next to a decorated journal.\r\n\r\nSo, I will get back to this ritual tonight. Getting back to things after periods of abandonment can sometimes feel like a sheer act of will. It’s so much harder to get back to than to give up, let go, abandon, as the past few weeks in quarantine have taught me. Falling into sub-optimal (re: embarrassing) behaviors so quickly when normal routines are lacking. Regressing to primal instincts (hoarding supplies, food) when feeling threatened and fearful. Why? It’s as if impulsively checking the precise number of COVID-19 cases can give some semblance of control, counteracting all of the uncertainty. ', '2020-06-03 11:50:28', 6, 0),
(12, 'A Day in the Life: Quarantine Edition', 'I dont know how much longer I could take this', 'We coaches at the Writing and Learning Center wanted to give a bit of insight into how all of us write and learn. To start off our blog, I wanted to write about what life is like for me in this current moment, as a senior, a writing coach, and a full-time student doing life from home. It’s bound to get a bit messy, but so it is these days. We’re all in this together.The sound of an alarm, someone making noise downstairs, or the dog barking wakes me up. I feel almost as if I’m in high school again, but I’m not. I’m a college senior, not a high school senior, in my last semester at UNC.\r\n\r\nA photo of a laptop from the viewer\'s perspective with a clean, furnished room in the background and a black dog on the far couch.\r\n\r\n9:05 AM:\r\n\r\nMy first Zoom class begins. Twenty-eight students have also just signed in, all hanging out with their video feeds turned off. Some classmates have profile pictures, but most don’t. I do my best to pay attention. In my parents’ living room, I’ve set up a little portable desk, complete with a blanket and coffee. I even have a cappuccino routine now. My dog or cat (sometimes both) curls up next to me. Having my pets around me is one advantage to being home, I suppose.', '2020-06-03 11:51:25', 6, 0),
(13, 'Examples of Blogs', 'Inspiration for New Bloggers', 'If you’re thinking of starting your very own blog, but just don’t have a clue on what to blog about, then fear not!\r\n\r\nIn this article, I have included a whole load of blog examples from a wide variety of different niches.\r\n\r\nSince the beginning of the internet, millions and millions and millions of blogs have been created. Many have died due to lost interest or their owners giving up on the idea, while others have thrived and continue to grow, making money and earning their owners a steady income. It’s a constant evolution of content that keeps people coming back for more, especially if these blogs contact highly resourceful material that people find useful and interesting.\r\n\r\nEach example listed in this blog post are all different in some way and all bring something unique to their readers & subscribers. I want to show you what is possible and how you can take inspiration from them and create an awesome blog of your own.\r\n\r\nSome of these blogs make over $100k a month, others are just a hobby for their owners, but all have the same purpose at their core… the love of writing and sharing information.', '2020-06-03 11:52:27', 7, 0),
(14, '10 dingen die iedereen doet onder de douche!', 'Terwijl je conditioner inwerkt of terwijl je gewoon nog even extra van het warme water wil genieten, wil je wel wat te doen hebben. En wij mensen doen de gekste dingen onder de douche. Daarom hier 10 dingen die iedereen doet onder de douche!', '1. Zingen- je vocals oefenen is belangrijk!\r\n\r\n2. Shampoo en douchegel flessen lezen.\r\n\r\n3. Moeten kiezen tussen verschillende soorten douchegel/shampoo en dus maar even een sessie ruiken wat het lekkerst ruikt\r\n\r\n4. Ruzies van eerder in je hoofd opnieuw afspelen terwijl je allerlei opmerkingen bedenkt die je dan had moeten gebruiken.\r\n\r\n5. Worst-case scenarios voor van alles bedenken\r\n\r\n6. Blij zijn dat niemand je lastig valt\r\n\r\n7. Tandenpoetsen - bespaart water en tijd!\r\n\r\n8. Twijfelen of je eronder vandaan zal komen omdat je anders kou lijdt\r\n\r\n9. Droom scenarios bedenken- \'and the Oscar goes to..\'\r\n\r\n10. Je leven en je levenskeuzes opnieuw overwegen en analyseren', '2020-06-03 11:53:53', 7, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT curdate(),
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `created`, `deleted`) VALUES
(1, 'Peter', 'b04cba33a9bc425eb0df02400aedbd77', '2020-06-02 22:00:00', 0),
(2, 'Piet', '426b6456892581ea43839ec530fecdc2', '2020-06-02 22:00:00', 0),
(3, 'Mark', '3dcb8a092a0a00b594a145624c6a0709', '2020-06-02 22:00:00', 0),
(4, 'Fred', 'e4e9c1c42f7e1a9c65d455aabe86c1af', '2020-06-02 22:00:00', 0),
(5, 'Thomas', '31d674be46e1ba6b54388a671c09accb', '2020-06-02 22:00:00', 0),
(6, 'Marijke', '19befa1599979552e499113d6b1bd389', '2020-06-02 22:00:00', 0),
(7, 'Johan', 'f8fe68b4c4cba197efa9c8bbd45f144e', '2020-06-02 22:00:00', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
