-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 04:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rojasg5_bobmusic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `a_ID` int(11) NOT NULL,
  `a_Email` varchar(255) NOT NULL,
  `a_FName` varchar(60) NOT NULL,
  `a_LName` varchar(60) NOT NULL,
  `a_Username` varchar(60) NOT NULL,
  `a_Password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`a_ID`, `a_Email`, `a_FName`, `a_LName`, `a_Username`, `a_Password`) VALUES
(1, 'hello@aol.com', 'John', 'Smith', 'jsmith', 'green123');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_ID` int(11) NOT NULL,
  `admin_Email` varchar(255) NOT NULL,
  `admin_FName` varchar(60) NOT NULL,
  `admin_LName` varchar(60) NOT NULL,
  `admin_Username` varchar(60) NOT NULL,
  `admin_Password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_ID`, `admin_Email`, `admin_FName`, `admin_LName`, `admin_Username`, `admin_Password`) VALUES
(1, 'admin@aol.com', 'Admin', 'Harry', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `p_Category` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`p_Category`, `categoryName`) VALUES
(1, 'Guitars'),
(2, 'Keyboards'),
(3, 'Percussion'),
(4, 'Orchestra'),
(5, 'Sound Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_ID` int(11) NOT NULL,
  `e_FName` varchar(255) NOT NULL,
  `e_LName` varchar(255) NOT NULL,
  `e_Phone` varchar(12) NOT NULL,
  `e_Address` varchar(255) NOT NULL,
  `e_DOB` date NOT NULL,
  `e_Username` varchar(60) NOT NULL,
  `e_Password` varchar(60) NOT NULL,
  `SSN` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_ID`, `e_FName`, `e_LName`, `e_Phone`, `e_Address`, `e_DOB`, `e_Username`, `e_Password`, `SSN`) VALUES
(1, 'Jerry', 'Willis', '862-000-0000', '456 Birch Street, New York, NY', '1993-11-22', 'willisj1', 'employee1', '123-45-6789');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_ID` int(11) NOT NULL,
  `manager_Email` varchar(255) NOT NULL,
  `manager_FName` varchar(60) NOT NULL,
  `manager_LName` varchar(60) NOT NULL,
  `manager_Username` varchar(60) NOT NULL,
  `manager_Password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_ID`, `manager_Email`, `manager_FName`, `manager_LName`, `manager_Username`, `manager_Password`) VALUES
(1, 'manager@aol.com', 'Bob', 'Law', 'managerbob', 'musicstore');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `item_ID` int(11) NOT NULL,
  `o_ID` int(11) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `item_Bill` decimal(10,2) NOT NULL,
  `item_Quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`item_ID`, `o_ID`, `p_ID`, `item_Bill`, `item_Quantity`) VALUES
(1, 1, 4, '2500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_ID` int(11) NOT NULL,
  `a_ID` int(11) NOT NULL,
  `o_Date` datetime NOT NULL,
  `o_Bill` decimal(10,2) NOT NULL,
  `o_Quantity` int(11) NOT NULL,
  `o_Address` varchar(255) NOT NULL,
  `o_cardNumber` char(16) NOT NULL,
  `o_cardExpires` char(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_ID`, `a_ID`, `o_Date`, `o_Bill`, `o_Quantity`, `o_Address`, `o_cardNumber`, `o_cardExpires`) VALUES
(1, 1, '2016-12-13 00:00:00', '2500.00', 1, '123 Willow Street, Montclair, NJ 07043', '1234567890123456', '12/17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_ID` int(11) NOT NULL,
  `p_Category` int(11) NOT NULL,
  `p_Price` decimal(10,2) NOT NULL,
  `p_Name` varchar(255) NOT NULL,
  `abbrvName` varchar(60) DEFAULT NULL,
  `p_Quantity` int(11) NOT NULL,
  `p_Description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_ID`, `p_Category`, `p_Price`, `p_Name`, `abbrvName`, `p_Quantity`, `p_Description`) VALUES
(1, 1, '1999.00', 'Gibson Les Paul', 'lespaul', 15, 'The perfect guitar for the player who is looking for authentic Gibson tones, \r\n  with the best of what modern craftsmanship has to offer. The traditional mahogany-maple tonewoods with satin finish and nickel \r\n  hardware, accompanied by vintage-style keystone tuners, give this Les Paul Tribute a true vintage vibe. Its slim-taper neck \r\n  profile, powerful modern humbucking pickups, and comfort-enhancing weight relief make it fit for todays most demanding players. \r\n  Delivered in a padded gig bag with a strap and polishing cloth.'),
(2, 1, '1250.00', 'Fender Stratocaster', 'strat', 10, 'The American Standard Stratocaster Electric Guitar with Maple \r\n  Fingerboard is a Fender icon. It is a beauty to behold in sound, look and feel. Features include hand-rolled \r\n  fingerboard edges, Custom Shop Fat 50s pickups, staggered tuners, improved bridge with bent steel saddles and \r\n  copper-infused high-mass block for increased resonance and sustain, tinted neck, high-gloss maple fretboard, satin \r\n  neck back for smooth playability, thin-finish undercoat that lets the body breathe and improves resonance, and Fender Tolex case.'),
(3, 1, '1250.00', 'Gibson ES-355', 'gibson', 12, 'The ES-355 Limited Run electric guitar makes one of the great Gibson \r\n  classics of the late 50s available again as a beautifully crafted and finished Custom Shop masterpiece. This one \r\n  sports the classic Bigsby vibrato. Includes black levant hardshell case. The Gibson ES-335 brought hollowbody \r\n  tradition and solidbody performance together in 1958, and it is still one of the all-time classic guitar designs. \r\n  It is among the most versatile guitars you can own. Classic semi-hollowbody design and dual 57 Classic Gibson humbuckers \r\n  combine to produce everything from full-bodied growls to singing sustain. The ES-335 also features a thin-tapered 1960s \r\n  neck and Richlite fingerboard (24-3/4" scale), body/neck binding, nickel-plated hardware with Grover kidney tuners, \r\n  Tune-O-Matic bridge with stopbar tailpiece, separate volume and tone controls, and a 3-way switch.'),
(4, 1, '2500.00', 'Gretsch White Falcon', 'gretschwhite', 20, 'Luxurious gold appointments and elegant white finish enhance the \r\n  world-famous appeal of the classic Gretsch Guitars G6136T White Falcon. The White Falcon features dual High \r\n  Sensitive Filter Tron pickups, a vertical Gretsch headstock logo, Bigsby B6GB vibrato tailpiece, and feather \r\n  engraved mother-of-pearl hump block position markers. Gretsch includes a hardshell case with the G6136T. Includes case.'),
(5, 1, '1499.00', 'Martin Mahogany Acoustic', 'martin', 29, 'The Martin 00015M acoustic guitar has the long recognized the \r\n  excellent tonal qualities of mahogany – bright, clear trebles and a warm mid-range. Among Martins most affordable \r\n  solid wood guitars, the 00015M acoustic guitar is the most visually distinctive and innovative. Additional features \r\n  include herringbone rosette, rich satin finish, patented neck mortise and A-frame X bracing for enhanced tone.'),
(6, 1, '1550.00', 'Fender USA Custom Pro', 'fenderpro', 23, 'Created by experienced luthiers in a limited quantity at the \r\n  Fender Acoustic Custom Shop, the TPD-2 is available in Natural and Three-color Sunburst finishes and is designed \r\n  for professional guitarists who require the ultimate in tone and feel. Every detail of the TPD-2 comes from a painstaking \r\n  process of hand-selecting matched woods and well thought-out components, including a fine AAA Sitka spruce top and \r\n  master-grade solid rosewood back and sides. Includes deluxe hard-shell case, deluxe leather strap and certificate of authenticity.'),
(7, 2, '169.00', 'M-Audio Oxygen 49 MKIV', 'oxygen49', 11, 'Created by experienced luthiers in a limited quantity at the \r\n  Fender Acoustic Custom Shop, the TPD-2 is available in Natural and Three-color Sunburst finishes and is designed \r\n  for professional guitarists who require the ultimate in tone and feel. Every detail of the TPD-2 comes from a painstaking \r\n  process of hand-selecting matched woods and well thought-out components, including a fine AAA Sitka spruce top and \r\n  master-grade solid rosewood back and sides. Includes deluxe hard-shell case, deluxe leather strap and certificate of authenticity.'),
(8, 2, '129.00', 'Casio Inc. LK175 61-Key Lighted Key Personal Keyboard', 'casiolighted', 12, 'Casio LK-175 makes learning to play \r\n  the piano entertaining and fun. The lighted keys and Casios Step up Lesson System provide instruction and \r\n  assistance allowing you to gain experience and eventually play on your own. The LK-175 is much more than an \r\n  instructional keyboard. It offers 61 piano-style lighted keys, a Sound EFX Sampler with built-in Microphone, \r\n  400 Tones, 150 Rhythms, 110 Songs, 48 Note Polyphony, USB MIDI, Step up Lesson System. The LK-175 has more than enough \r\n  features to take you beyond the initial learning steps.'),
(9, 2, '6290.00', 'Korg Kronos X 88-Key Music Workstation', 'korg', 9, 'The Kronos music workstation was unveiled \r\n  in 2011. Everyone who experiences its sound reacts with astonishment at how far electronic musical instruments have come. \r\n  But, in the year since its inception, KORG has continued to release system updates and additional Kronos Sound Libraries, \r\n  bringing the Kronos to an even higher state of perfection. Rather than resting on its laurels in 2012, the Kronos continued \r\n  to evolve. Boosting its internal memory capacity and the size of its SSD, as well as enhancing its sampler functionality, we \r\n  have included more of the latest technology in order to make the Kronos the ultimate workstation. Fittingly, its new name \r\n  adds an X to indicate its unknown potential. Ready to take off into the unknown future of sound we present the Kronos X music workstation.'),
(10, 2, '3995.00', 'Suzuki Acoustic Pianos SZV-48 Acoustic Vertical Piano 48', 'suzuki', 4, 'Compact vertical piano for home. Exceptional furniture \r\n  quality hand rubbed black lacquer cabinet featuring European Chrome Hardware. From beginner to Pro, a beautiful instrument ideal for home, \r\n  school, church or performing arts center.  Individually crafted from the finest materials. Select solid spruce soundboard with \r\n  contoured ribs, German Roslau strings, 18 ply cross grained pinblocks, imported felt bushings and hammerheads with Japanese \r\n  virgin wool felt coverings.'),
(11, 2, '3095.00', 'Moog MIN010010 Minimoog Voyager Performer Edition, Black', 'moog', 13, 'The Miniboom Voyager Performer Edition is \r\n  a handcrafted, all-analog performance synthesizer that incorporates the features and incredible sonic range of the original Miniboom, \r\n  while adding a vast number of new functional improvements to its design. And just like the original Miniboom, the Miniboom Voyager was\r\n   designed and brought to life by synthesizer pioneer, Bob Moog. The Miniboom Voyager Performer Edition is the traditional Miniboom \r\n   Voyager. It is housed in a rugged steel chassis that is secured in a stunning, custom finished ash cabinet. It is fitted with a \r\n   top of the line, 44-key Fatar key bed and comes stock with cool grey pitch/mod wheels. Features: 100% Analog Signal Path Ultra-Stable \r\n   Oscillators 2 Legendary Moog Ladder Filters 2 Four-Stage Analog Envelope Generators 2 Flexible Modulation Busses Assignable X/Y/A \r\n   Touch Control Interface Over 800 Onboard Presets CV/Gate Expansion Port Awards include: "Key Buy" award from Keyboard magazine \r\n   "Platinum Award" from Future Music magazine "Excellence Award" from Music Tech magazine "TEC" award from Mix magazine \r\n   "Editors Choice award" from Electronic Musician magazine. Oscillators Module3 wide-range, high-stability VCOs (Voltage Controlled\r\n    Oscillators) with continuously variable waveforms. FREQUENCY controls (2) vary the frequencies of Oscillators #2 and #3 over a +/-7 \r\n    semitone range with respect to Oscillator #1.OCTAVE selectors (3) set the frequency ranges of the oscillators in six octave steps. \r\n    WAVE controls (3) provide continuous control over the waveforms of the oscillators, from triangular, to saw tooth, to square, to \r\n narrow rectangular.'),
(12, 2, '199.77', 'Yamaha YPG-235 76-Key Portable Grand Piano', 'yamahapiano', 32, 'The Yamaha Portable Grands have an \r\n  easy-to-use panel, a wealth of piano-centric features including piano-style keys, Graded Soft Touch (GST) action with \r\n  different levels of resistance and a high resolution stereo piano sample. It is the music student or professional musicians \r\n  answer to more keys! And many music teachers encourage new students to get a keyboard that will grow with their needs.'),
(13, 3, '399.99', 'DW Performance 5 Piece', 'dwdrums', 4, 'The Yamaha Gigmaker 5-Piece Shell Pack is the perfect solution \r\n  for beginning or intermediate drummers who want the quality of a Yamaha drum kit, without the hefty price tag. Includes \r\n  a 22"x 16" kick drum, 13" x 9-1/2" and 12"x 9" mounted toms, a 16" x 16" floor tom, and 14" x 5-1/2" wood snare. \r\n  The Gigmaker kick drum shell is 7 plies of basswood/poplar, and the floor toms, rack toms, and snare drum shells are 6 plies \r\n  of basswood/poplar. Each drum is equipped with triple-flange, 1.6mm steel hoops and pro-quality lugs-eight on the kick and \r\n  snare, six on the rack and floor toms. The springless design of these popular Yamaha drum lugs is structured to effectively \r\n  eliminate unwanted noise. Cymbals and hardware sold separately.'),
(14, 3, '2450.00', 'Roland TD-25 KV Tour Kit', 'rolanddrums', 10, 'A mid-level kit for home or studio, TD-25KV is \r\n  equipped with a sound engine derived from the flagship TD-30 and delivers all the acclaimed expressiveness that \r\n  makes Roland top-line V-Drums the undisputed choice of pro players everywhere. A streamlined interface makes it \r\n  easy to create personalized kits, while the built-in audio recording function lets you capture drum performances \r\n  for evaluation and sharing. Other premium features include mesh-head pads for a natural feel, positional snare \r\n  sensing for enhanced expression, and the VH-11 V-Hi-Hat for playing with authentic hi-hat techniques.'),
(15, 3, '4500.00', 'PDP Z5 5-Piece Drum Set', 'pdpdrums', 33, 'An ideal shell pack for aspiring drummers. The \r\n  perfect shell pack for beginning drummers.This 5-piece Z5 Series drum shell pack from PDP is a great shell pack \r\n  for drummers that are just starting out. The 5-piece shell pack comes in fusion tom sizes (10" x 8", 12" x 9", \r\n  and 14" x 12") with all-wood shells, FinishPly wrap, and a variety of stunning colors. Cymbals and hardware not included.'),
(16, 3, '2500.00', 'Simmons SD1500 Electronic Drum Set with Blue Metallic Rack', 'simmonsdrums', 23, 'The Simmons SD1500KIT\r\n is the most realistic and comprehensive electronic drum kit in its class. With a versatile 6-pad configuration PLUS four \r\n cymbals and hi-hat controller, it is maxed out right out of the box. Built around the exceptional sound library of the \r\n SD1000 Digital Sound Module, you benefit from 22 separate trigger zones, plus chokes on the cymbal pads.The SD1500KIT \r\n also features several key updates from the SD1000, including triple zone snare, floor tom and cymbal pads, heavy-duty \r\n kick pad stand and the new heavy-duty hex drum rack. Whether you are practicing, recording or playing out, the SD1500KIT \r\n provides a biggest drumming experience in its class.'),
(17, 3, '399.00', 'Ludwig BreakBeats 4-Piece by QuestLove', 'ludwigdrums', 7, 'For anyone putting together an ideal \r\n  drum set for less-than-ideal environments, Ludwigs Breakbeats 4-piece shell pack is perfect. Ludwig actually \r\n  brought in the famous Roots drummer Questlove to help them create a compact set of drums that travel wonderfully \r\n  and still pack more than enough punch to fill out the backbeat when you are playing tight clubs. With hardwood shells, \r\n  Remo Pinstripe heads, and ingenious hardware, you will feel right at home behind this set. Top it off with an included \r\n  set of velvet gig bags, and you are ready to grab your Breakbeats drums and go.  The thing that makes Ludwig Breakbeats\r\n   drums such a great solution for gigging drummers is that they do not feel restrictive. That is because these drums \r\n   combine clever designs and full-sized heads to achieve the feel and sound of a full kit. When the drummers here at \r\n   Sweetwater got to check out this setup, one of the things that impressed us the most is the bass drum riser, which \r\n   elevates the compact 16" bass drum so that it is the perfect height for your kick pedal.'),
(18, 3, '5500.00', 'Roland TD30KV Pro-Series', 'rolandtd30kv', 5, 'The Roland TD-30KV V-Pro electronic drum kit gives \r\n  you a whole new level of e-drum realism and expression. When you are playing Rolands flagship kit, you will forget that \r\n  you are hitting sophisticated technology and simply relish the natural feel of acoustic drums. The TD-30KV V-Pro kit \r\n  faithfully responds to all the subtlety and nuance of your performance while sending killer SuperNATURAL drum sounds \r\n  to your DAW or digital board via USB. If you are a drummer seeking state-of-the-art electronic drums, we have your \r\n  kit: Rolands TD-30KV V-Pro.'),
(19, 4, '999.00', 'Etude Trumpet', 'etudetrumpet', 17, 'The Etude ETR-100 Student Trumpets generous bore makes it easy \r\n  for a beginner to play while learning to form notes accurately. You will be heard on your ETR-100 trumpet whether you\r\n   are performing on stage or with your marching band thanks to the Etude trumpets red brass lead pipe-crafted for easy \r\n   tone production and great projection. More trumpet players drop the instrument in the first year or two than in any \r\n   other. Oftentimes, the reasons are as much mechanical as they are musical. With the Etude ETR-100, a satisfying bleat \r\n   often pops out of the end of the horn within the first couple of attempts. Then, as the valves become less of a mystery, \r\n   you can count on smooth action and precise note slotting.'),
(20, 4, '899.00', 'Etude Trombone', 'etudetrombone', 29, 'The Etude ETB-100 Series Student Trombone features a \r\n  .495" bore designed for easy tone production and projection. This trombone also features a brass outer handslide \r\n  and crook plus a chrome inner handslide for enhanced durability. Includes a mouthpiece and case. The ETB-100 displays\r\n  a great design and reflects Etudes commitment to outstanding construction, resulting in an instrument that will \r\n  give you years of musical enjoyment and give your student every chance to develop a lifelong association with the love of music.'),
(21, 4, '4200.00', 'Holton Double Horn', 'holtonhorn', 19, 'Same as the H180 with detachable bell. Free-blowing \r\n  horn with rich and resonant intonation. Bell and branch are made of a special brass alloy for slightly darker tonal \r\n  coloring. Good projection. Model H180 is an excellent orchestral horn with dark sound and bright overtones.'),
(22, 4, '2000.00', 'Etude Saxophone', 'etudesax', 17, 'Made out of fine metals for superior tone production, the Etude \r\n  EAS-100 is the perfect instrument for starting out on the alto saxophone. The keywork, pads, and adjustment all work \r\n  together to make tone production easier, more consistent, and stronger. And the bell brace and construction help make it \r\n  as durable as possible. Includes case, mouthpiece, cap, and ligature.It may be tempting to buy a "better" horn used, but \r\n  saxophones are mechanically complex, and if the horn is not well regulated and set up properly, it will be extremely difficult \r\n  for a student to play. It is perhaps advisable then for a new student to get an Etude EAS-100, brand new, set up perfectly, \r\n  and ready to play right out of the case. It will be shiny and beautiful, and your young saxophonist will jump up and down \r\n  and squeal when he or she sees it. Pride of ownership inspires practice, and practice leads to success.'),
(23, 4, '599.00', 'Etude Clarinet', 'etudeclarinet', 12, 'The Etude ECL-100 Clarinet offers sturdy construction\r\n with classic looks and sound. Combining a plastic body with nickel keys, it is designed for easy tone production \r\n and durability. With strong projection and smooth, responsive playability, it sounds and feels like a much more \r\n expensive instrument Includes case, mouthpiece, cap, and ligature. Etude believes price should not be a barrier \r\n to experiencing the growth and joy that comes from making music. That is why Etude offers five of the most popular woodwind \r\n and brass instruments at an incredible price: flute, clarinet, alto sax, trumpet, and trombone. And no matter which you \r\n choose, you get a great design and outstanding construction that will give you years of musical enjoyment. See for yourself!'),
(24, 4, '1050.00', 'Stentor Violin', 'stentorviolin', 22, 'Stentor Student I Violin is hand carved from solid \r\n  tonewoods with good quality rosewood pegs and fingerboard and alloy tailpiece with four integral adjusters. \r\n  The outfit includes a reliable student wood bow and well designed lightweight case with accessory pockets and \r\n  carrying straps. Available in sizes: 4/4, 3/4, 1/2, 1/4, 1/8. Stentor violins, violas, and cellos are made by \r\n  hand in a workshop environment in much the same way that they have been made in Europe for hundreds of years. \r\n  Stentor instruments have the essential characteristics of good tone quality plus correct measurements and \r\n  specifications. Stentor sells more violins than any other company worldwide.'),
(25, 5, '700.00', 'QSC K10 10" Powered PA Speaker', 'qscspeaker', 6, 'The QSC K10 10" powered loudspeaker, \r\n  featuring its revolutionary 1000W power module, delivers the high-quality amplification, HF driver, and \r\n  low-frequency driver of the K-Series speakers, offering 90 conical coverage and 129dB peak output, low \r\n  frequencies extending to 56Hz. The K10 offers exceptional power and performance from an extremely compact system, \r\n  and it can also be used as an ultra low-profile, horizontal wedge or side fill.'),
(26, 5, '1499.00', 'Electro-Voice ETX-18SP 18" Powered Subwoofer', 'subwoofer', 9, 'No matter what kind of music \r\n  you play, a subwoofer will add a warmth and depth of presence that you and your audience will find engaging, \r\n  pleasing, and even intoxicating. "But I play in an acoustic band," you say. A lot of the charm and character \r\n  of an acoustic guitar signal resides in some surprisingly low frequencies. The fundamental frequency of an E \r\n  string is 82 Hz, and the A is 110 Hz. The EV ETX-18SP is an 18" powered subwoofer with 1800 watts of Class-D \r\n  power with 135 dB peak SPL. It reproduces frequencies from 28 Hz to 180 Hz, so whether you are adding depth \r\n  and warmth to vocals and acoustic guitars in an Americana setting or DJing dubstep and drum and bass in a dance \r\n  club, the ETX-18SP will add a new dimension to your performance.'),
(27, 5, '199.00', 'Yamaha MG10XU 10-Channel Mixer with Effects', 'yamahamixer', 20, 'Now in its third incarnation, \r\n  the MG Series embodies the pursuit of design excellence, and incorporates some of the same technologies developed \r\n  for use in high-end professional consoles, including studio-quality preamps, powerful digital processing, and a\r\n   rugged, reliable construction. The MG10XU is the ten-channel version of the series, with four mono XLR and 1/4" \r\n   hybrid inputs along with three stereo line inputs.'),
(28, 5, '399.00', 'Shure SM7B Microphone with Switchable Response', 'shuremic', 11, 'The flat, 50Hz-20kHz frequency \r\n  response of the Shure SM7B Microphone with Switchable Response is designed especially for spoken word, but recording \r\n  engineers have discovered that it is also an exceptional mic for adding body to thin vocals and handling \r\n  loud rock/metal singers. It also has the ability to tame harsh or sibilant sounds from hi-hat, cymbals, and \r\n  voice. Highly shielded against electrical interference. Bass roll-off and mid-range emphasis (presence boost) \r\n  controls with graphic display. Internal "air suspension" shock isolation. Ships with standard windscreen and \r\n  an A7WS detachable windscreen for close-talk applications.'),
(29, 5, '300.00', 'Sennheiser HD8 DJ Headphones', 'sennheiserheadphones', 34, 'Take control of the club with \r\n  Sennheisers top-of-the-line DJ model - HD8 DJ. Designed for the most demanding users and punishing pro environments, \r\n  they have been developed in conjunction with some of the worlds top DJs. Acoustically, they are inspired by the \r\n  legendary HD 25 and deliver an excellent sound reproduction, focusing on the rhythm and beat matching which professionals need.'),
(30, 5, '800.00', 'QSC GXD 8 Professional Power Amplifier', 'qscamplifier', 10, 'Lightweight, powerful and affordable \r\n  are the chief defining characteristics of the QSC GXD series amplifiers. The GXD 8 is sure to become a favorite with \r\n  bands, DJs and sound reinforcement professionals of all kinds.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_ID`,`a_Username`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_ID`,`admin_Username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`p_Category`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_ID`,`manager_Username`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `o_ID` (`o_ID`),
  ADD KEY `p_ID` (`p_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_ID`),
  ADD KEY `a_ID` (`a_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_ID`),
  ADD KEY `p_Category` (`p_Category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `p_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
