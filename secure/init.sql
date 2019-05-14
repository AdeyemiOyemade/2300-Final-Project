-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- Users Table
CREATE TABLE 'users' (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	user_name TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL
);

-- Users seed data
INSERT INTO users (id, user_name, password) VALUES (1, 'admin', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'); -- password: monkey

-- Sessions Table from lab 8
CREATE TABLE 'sessions' (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	user_id INTEGER NOT NULL, -- user signed in
	session TEXT NOT NULL UNIQUE
);

CREATE TABLE `listserve` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name` TEXT NOT NULL,
	`email` TEXT NOT NULL
);

CREATE TABLE `events` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name` TEXT NOT NULL,
	`startdate` DATE NOT NULL,
	`enddate` DATE,
	`starttime` TIME,
	`endtime` TIME,
	`location` TEXT,
	'photo_name' TEXT,
	'photo_ext' TEXT,
	'source' TEXT
);

INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (1, 'Display: Walk In My Shoes', "2019-04-14", "2019-04-18", "", "", 'Arts Quad', '1', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (2, '#REFUGEERIGHTS Photo Campaign', "2019-04-15", "2019-04-19", "11:30", "14:30", 'Willard Straight Hall', '6', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (3, 'Documentary Screening: Lifeboat', "2019-04-15", "", "16:30", "18:00", 'Cornell Cinema', '22', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (4, 'Is our humanitarian tradition under threat? U.S. Refugee Asylum Policy in the 21st Century', "2019-04-18", "", "10:30", "11:30", 'Willard Straight Hall', '21', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (5, 'From Solidarity to Support: Refugees in our Communities', "2019-04-17", "", "17:30", "18:30",'One World Room Anabel Taylor Hall', '19', 'jpg', "Picture is the property of Cornell Welcomes Refugees");
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (6, 'Remembering Mullivaikkal: Sri Lanka 10 years on', "2019-04-16", "", "16:45", "19:15", "A.D. White House", '2', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');
INSERT INTO events (id, name, startdate, enddate, starttime, endtime, location, photo_name, photo_ext, source ) VALUES (7, 'Chai and Chat: South Asian Refugee Crisis Past and Present', "2019-04-19", "", "17:00", "18:00", "Willard Straight Hall", '25', 'jpg', 'Picture is the property of Cornell Welcomes Refugees');

CREATE TABLE `resources` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`resource_id` INTEGER NOT NULL,
	`resource_description` TEXT NOT NULL,
	`resource_link` TEXT NOT NULL
);

/* Source https://einaudi.cornell.edu/working-group/immigration-and-migration */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (1,5,"Mario Einaudi Center for International Studies: Immigration and Migration Working Group", "https://einaudi.cornell.edu/working-group/immigration-and-migration");

/* Source https://africana.cornell.edu/mostafa-minawi */
INSERT INTO resources (id, resource_id, resource_description, resource_link)VALUES (2,4,"Professor Mostafa Minawi", "https://africana.cornell.edu/mostafa-minawi");

/* Source https://www.lawschool.cornell.edu/MigrationandHumanRightsProgram/index.cfm  */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (3,1,"Migration and Human Rights Program", "https://www.lawschool.cornell.edu/MigrationandHumanRightsProgram/index.cfm");


/* Source https://www.lawschool.cornell.edu/Clinical-Programs/Immigration-Appellate-Law-and-Advocacy-Clinic/ */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (4,1,"Asylum and Convention Against Torture Appellate Law Clinic", "https://www.lawschool.cornell.edu/Clinical-Programs/Immigration-Appellate-Law-and-Advocacy-Clinic/");

/* Source https://www.lawschool.cornell.edu/Clinical-Programs/Farmworker-Legal-Assistance/index.cfm */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (5,1,"Farmworker Assistance Program", "https://www.lawschool.cornell.edu/Clinical-Programs/Farmworker-Legal-Assistance/index.cfm");

/* Source https://www.lawschool.cornell.edu/faculty/bio_stephen_yale-loehr.cfm */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (6, 1,"Stephen W Yale-Loehr", "https://www.lawschool.cornell.edu/faculty/bio_stephen_yale-loehr.cfm");

/* Source https://www.lawschool.cornell.edu/faculty/bio_chantal_thomas.cfm */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (7, 1,"Chantal Thomas", "https://www.lawschool.cornell.edu/faculty/bio_chantal_thomas.cfm");

/* Soruce https://www.lawschool.cornell.edu/faculty/bio_aziz_rana.cfm */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (8, 1,"Aziz F Rana", "https://www.lawschool.cornell.edu/faculty/bio_aziz_rana.cfm");

/* Source https://anthropology.cornell.edu/hirokazu-miyazaki */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (9, 3,"Hirokazu Miyazaki", "https://anthropology.cornell.edu/hirokazu-miyazaki");


/* Source https://anthropology.cornell.edu/saida-hod%C5%BEi%C4%87 */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (10, 3,"Saida Hodizic", "https://anthropology.cornell.edu/saida-hod%C5%BEi%C4%87");

/* Source  https://www.human.cornell.edu/people/msh284 */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (11, 2,"Matthew Hall", "https://www.human.cornell.edu/people/msh284");

/* Source  https://www.human.cornell.edu/cipa/academics/mpa */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (12, 2, "Cornell Institute for Public Administration: MPA Masters Program
", "https://www.human.cornell.edu/cipa/academics/mpa");

/* Source https://www.human.cornell.edu/people/jrm534 */
INSERT INTO resources (id, resource_id, resource_description, resource_link) VALUES (13, 2,"John Mathiason
", "https://www.human.cornell.edu/people/jrm534");

CREATE TABLE `resource_types` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name` TEXT NOT NULL
);

INSERT INTO resource_types (id, name) VALUES (1, "Law School");
INSERT INTO resource_types (id, name) VALUES (2, "Department of Human Ecology");
INSERT INTO resource_types (id, name) VALUES (3, "Department of Anthropology");
INSERT INTO resource_types (id, name) VALUES (4, "Africana Studies and Research Center");
INSERT INTO resource_types (id, name) VALUES (5, "Immigration and Migration Working Group");

CREATE TABLE `stories` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name` TEXT NOT NULL,
	`country` TEXT NOT NULL,
	`blurb` TEXT NOT NULL,
    `story` TEXT NOT NULL,
	`picture_name` TEXT NOT NULL,
	`picture_ext` TEXT NOT NULL,
	`pic_source` TEXT NOT NULL,
    `pic_source_link` TEXT NOT NULL
);

/* SOurce https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed */
INSERT INTO stories (id, name, country, blurb, story, picture_name, picture_ext, pic_source, pic_source_link) VALUES (1, 'Alia', 'Syria', "Alia fled her home in Aleppo, Syria and is currently living in Damour, Lebanon. She shared her story through Gruppo Aleimar, an Italian NGO which provides free, nutritious meals to refugees in the Damour area. Alia is 7 years old. ", "The last thing I remember of Syria, before we left, was when my mother was taking me from our place to our grandparents. The roads were full of dead corpses. I saw dead people with no heads or no hands or legs. I was so shocked I couldn’t stop crying. To calm me down, my grandfather told me they were mean people, but I still prayed for them, because even if some considered them mean, they were still dead human beings. Back at home, I left a friend in Syria, her name was Rou’a. I miss her a lot and I miss going to school with her. I used to play with her with my Atari, but I couldn’t bring it with me. I also used to have pigeons, one of them had eggs, I would feed them and care for them. I’m worried about them, I really pray someone is still caring for them. But here I have a small kitten that I really love! I miss my home a lot. I hope one day we’ll be back and things will be just like before.", "Alia", 'jpg', 'Medium','https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed');

/* Source https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed */
INSERT INTO stories (id, name, country, blurb, story, picture_name, picture_ext, pic_source, pic_source_link) VALUES (2, 'Bizimana', 'Rwanda', 'He fled his home in Rwanda and is now living in Nairobi, Kenya. Bizimana’s story was shared with us by Refugees International Japan, which focuses on the health, education and economic livelihoods of people displaced by conflict around the world. ', 'Bizimana was two years old when his family had to flee the Rwandan genocide to Burundi. From there he moved to camps in Tanzania and now lives in Nairobi, Kenya. He received business start-up training and has established a business that has grown so fast he is now able to start a cafe service. He is also a prize-winning singer.', "Bizimana", 'jpg', 'Medium','https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed');

/* Source https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed */

INSERT INTO stories (id, name, country, blurb, story, picture_name, picture_ext, pic_source, pic_source_link) VALUES (3, 'Achan', 'South Sudan', "She fled her home in Pajok, South Sudan and is currently living in a refugee camp in Lamwo District, Uganda. She is 75 years old. ", "Achan is a widow who had eight children. Seven of her children died during the ongoing war in her home country of South Sudan. As a result, she was left with many orphans to take care of. Before the war, she was a peasant farmer in Sudan who cultivated to sustain her big family. When the war broke out in her community, she and her family ran to save their lives, leaving all their belongings behind. She believes her home has been destroyed by the rebels.", "Achan", 'jpg', 'Medium','https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed');

/* Source https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed */
INSERT INTO stories (id, name, country, blurb, story, picture_name, picture_ext, pic_source, pic_source_link) VALUES (4, 'Fouzia', 'Afghanistan', 'She fled her home in Kabul, Afghanistan, lived for 14 years in Tajikistan, and has recently returned to Kabul. She is 24 years old. Fouzia wants to be a teacher to help spread peace through education in Afghanistan. For her safety, we did not share her photo, but rather another photo from AAE’s school. ', "During the factional war, my family and I left the country as it became unbearable to live in Kabul. Hundreds, or I think thousands, of rockets were hitting the city every day. We left for Tajikistan and came back when we heard there is peace in Afghanistan. We lived in Tajikistan for 14 years with the hope of going back home. Tajikistan was not our country.", "Fouzia", 'jpg', 'Medium','https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed');

/* Source https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed */
INSERT INTO stories (id, name, country, blurb, story, picture_name, picture_ext, pic_source, pic_source_link) VALUES (5, 'Noorkin and Yacob', 'Myanmar', "Noorkin and Yacob Noorkin and her son Yacob fled their home in Myanmar when Myanmar’s military and Buddhist extremist groups started clearance operations against Rohingya people. They are Rohingya refugees currently living in the Cox’s Bazar refugee camp in Bangladesh. Noorkin is 40 years old and Yacob is 10. ", "Back in Myanmar my father was a farmer and he also went fishing. Along with my siblings, I used to attend school regularly. I was in Grade 2 when we left. We used to learn Burmese literature in school. But it all came to an end the day our house got burnt. The houses in our village was on fire. We couldn’t run to the jungle because it was on fire too. We flee to another village but that village was also attacked. We were stranded so we fled again to a canal and stayed there for two days with no food. We made it across the border and now we live here in the camps,' Yacob explained. He continued: 'I like being a leader. At the centre, I get the children together and them ask them to follow me when I am doing the actions. I tell them ‘Please, I am going to start reciting the poem, so follow me.’ I am a good boy and a quick learner. I also make other children laugh. It is fun. I want to learn more and more because I want to become a teacher when I grow up.' 'They are slowly getting back to feeling normal again,' Noorkin said about her children. 'I desire a bright future for my children where they can be what they want to be.", 'NoorkinandYacob', 'jpg', 'Medium','https://medium.com/globalgoodness/12-powerful-refugee-stories-from-around-the-world-5c0a54d2e2ed');

CREATE TABLE `countries` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`country` TEXT NOT NULL,
	`picture_name` TEXT NOT NULL,
	`picture_ext` TEXT NOT NULL,
	`pic_source` TEXT NOT NULL,
    `pic_source_link` TEXT NOT NULL,
	`pic_alt` TEXT NOT NULL
);

/* Soruce https://www.worldliteraturetoday.org/2012/may/no-ordinary-place-writers-and-writing-occupied-palestine-rima-najjar-merriman */

INSERT INTO countries (id, country, picture_name, picture_ext, pic_source, pic_source_link,pic_alt) VALUES (1, 'Palestine', "palestine", 'jpg', 'World Literature Today','https://www.worldliteraturetoday.org/2012/may/no-ordinary-place-writers-and-writing-occupied-palestine-rima-najjar-merriman','Map Displaying Land Loss in Palestien from 1946 - 2010');

/* soruce https://wqad.com/2015/11/17/more-than-half-of-u-s-governors-say-syrian-refugees-not-welcome/ */
INSERT INTO countries (id, country, picture_name, picture_ext, pic_source, pic_source_link,pic_alt) VALUES (2, 'Syria', "syria", 'png', 'WQUAD', 'https://wqad.com/2015/11/17/more-than-half-of-u-s-governors-say-syrian-refugees-not-welcome/', 'Map of U.S. states currently accepting/not accepting Syrian refugees');

/* source ttps://www.theguardian.com/world/2018/feb/24/myanmar-rohingya-villages-bulldozed-satellite-images  */
INSERT INTO countries (id, country, picture_name, picture_ext, pic_source, pic_source_link,pic_alt) VALUES (3, 'Rohingya', "Rohingya", 'png', 'The Guardian','https://www.theguardian.com/world/2018/feb/24/myanmar-rohingya-villages-bulldozed-satellite-images','Map of Rohingyan Land destruction');


CREATE TABLE `country_facts` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`country_id` INTEGER NOT NULL,
	'term' TEXT,
	`fact` TEXT NOT NULL
);

INSERT INTO country_facts (id, country_id, fact) VALUES (1, 1, 'Years of conflict and blockade have left 80% of the Gazan population dependent on international assistance');
INSERT INTO country_facts (id, country_id, fact) VALUES (2, 1, '810,000 refugees in the West Bank, 1.3 million in the Gaza Strip');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (3, 1, 'Palestinians in Jordan:','Human Rights Watch reported that Jordan has been deporting an average of 400 Syrian refugees per month in 2017');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (4, 1, 'Palestinians in Syria:','500,000 pre-war population, 235,000 displaced after the war');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (5, 1, 'Palestinians in Lebanon:','10% of Lebanese Population, 66% in poverty');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (6, 1, 'Right of Return:',"A principle in international law which guarantees peoples' right of voluntary return to or re-entry to their country of origin or of citizenship. A right of return based on nationality, citizenship or ancestry may be enshrined in a country's constitution or law, and some countries deny a right of return in particular cases or in general. (will shorten)");
INSERT INTO country_facts (id, country_id, fact) VALUES (7, 1, 'There already are nearly 5 million registered Palestinian refugees in the United States, but with continued violence and persecution in their native region, as well as the gradual loss of their land to outside powers, more and more Palestians are in desperate need of refuge.
');

INSERT INTO country_facts (id, country_id, fact) VALUES (8, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (9, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '3.6 million refugees in Turkey');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (12, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '944,000 in Lebanon');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (13, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '660,000 in Jordan');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (14, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '254,000 in Iraq');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (15, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '132,000 in Egypt');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (16, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '35,000 in North Africa');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (17, 2, 'There are 5,648,002 total registered Syrian Refugees in the world right now:', '18,000 in the United States');
INSERT INTO country_facts (id, country_id, fact) VALUES (18, 2, 'Syrian refugees are a particularly marginalized group that struggle to be accepted as refugees in America.  Currently, over half of states in the U.S. are blatantly rejecting Syrian refugees from asylum, with the majority of the rest of the states not strongly committing to whether they are accepting syrian refugees or not.');
INSERT INTO country_facts (id, country_id, fact) VALUES (19, 2, '“When we were in the water, I saw people clinging on to dead bodies. I saw men trying to take life jackets from women.” - Anas, Syria');

INSERT INTO country_facts (id, country_id, fact) VALUES (20, 3, 'The Rohinya people have faced decades of systematic discrimination, statelessness, and violence in Myanmar. In August 2017, this violence escalated, triggering the largest and fastest refugee influx into Bangladesh');
INSERT INTO country_facts (id, country_id, fact) VALUES (21, 3, 'About 745,000 Rohingya--including 400,000 children--have fled to Bangladesh’s Cox’s Bazar');
INSERT INTO country_facts (id, country_id, fact) VALUES (22, 3, 'Entire villages were burned, families seperated and killed, women and girls were gang raped');
INSERT INTO country_facts (id, country_id, fact) VALUES (23, 3, 'As of march 2019, over 909,000 stateless refugees reside in Ukhiya and Teknaf Upazilas with the vast majority living in 24 camps');
INSERT INTO country_facts (id, country_id, term, fact) VALUES (24, 3, 'Refugees living in a state of limbo:', 'The largest camp site, the Kutupalong-Balubhai Expansion Site, hosts approximately 626,500 Rohingya refugees');
INSERT INTO country_facts (id, country_id, fact) VALUES (25, 3, 'In August of 2017, the UN High Commissioner for Human Rights described the crisis as a “textbook example of ethnic cleansing”');
INSERT INTO country_facts (id, country_id, fact) VALUES (26, 3, '“When they said never again, it means NEVER again.”');
INSERT INTO country_facts (id, country_id, fact) VALUES (27, 3, '“They burnt our house and drove us out by shooting. We walked for three days through the jungle.” Mohammed, who fled to Bangladesh with his family of seven, including a baby born along the way.');



CREATE TABLE `people` (
	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name` TEXT NOT NULL,
	`year` INTEGER NOT NULL,
	`major` TEXT NOT NULL,
	`hometown` TEXT NOT NULL,
	`bio` TEXT NOT NULL,
	`picture_name` TEXT NOT NULL,
	`picture_ext` TEXT NOT NULL,
	`pic_source` TEXT
);

INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (1, 'Ana Penavic', 2019, "Religious Studies", "Smithtown, NY", "Ana Penavic became interested in CWR after studying abroad in Jordan to learn more about refugee health and humanitarian action. Joining the organization gives her a way to continue all the work she did in Jordan.", "AnaPenavic", 'jpg', 'Ana Penavic');
INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (2, 'Ian Wallace', 2020, "History and Near Eastern Studies", "Utica, NY", "Ian Wallace is the co-president and is excited to work on this cause.", "IanWallace", 'jpg', 'Ian Wallace');
INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (3, 'Lauren Gillott', 2020, "Human Biology, Health, and Society", "Girdwood, AK","Lauren became involved with CWR after working with search and rescue groups in Lesbos, Greece and wanted a way to continue advocating for refugee issues on campus.", "LaurenGillott", 'jpg', 'Lauren Gillott');
INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (4, 'Lindy Davenport', 2020, "Near Eastern Studies and French", "Berryville, VA", " I was excited to see a group taking a positive and active stand to contradict the hateful rhetoric that has become all too prevalent.", "LindyDavenport", 'jpeg', 'Lindy Davenport');
INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (5, 'Malikul Muhammad', 2020, "ILR", "Harrisburg, PA","My parents and I came to America as refugees from Indonesia so I’ve always been exposed to and aware of issues that affect immigrant and refugee communities. I decided to join CWR to help the immigrant and refugee community in Ithaca and around the globe.", "MalikulMuhammad", 'jpg', 'Malikul Muhammad');
INSERT INTO people (id, name, year, major, hometown, bio, picture_name, picture_ext, pic_source) VALUES (6, 'Tarannum Sahar', 2020, "Mechanical Engineering and Economics", "Dhaka, Bangladesh", "I joined CWR in its founding year because I felt conversations surrounding refugee crises were critically lacking on Cornell’s campus. I’m from Bangladesh, a country that is currently home to over a million Rohingya refugees.","TarannumSahar", 'jpg', 'Tarannum Sahar');



COMMIT;
