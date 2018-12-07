<?php

/*
 * Team Favorites template
 *
 * @package Fifteen_Four_2018
 */


// Set attributes for component
$atts = array(
    'class' => 'cd-horizontal-timeline '
    . $args['additional_classes']
);

// Content atts
$content_atts = array(
    'class' => ' ' . $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $atts ); ?>>

<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol style="list-style:none;">
                    <li><a href="#0" data-tooltip="Ameritrade Founder and CEO Joe Ricketts travels to Tanzania." data-date="01/01/2005" class="selected">2005</a></li>
                    <li><a href="#0" data-tooltip="OE expands the Primary School Program." data-date="01/01/2006">2006</a></li>
                    <li><a href="#0" data-tooltip="Jim Ricketts begins leading OE operations." data-date="01/01/2007">2007</a></li>
                    <li><a data-tooltip="OE establishes its Sister School Program." href="#0" data-date="01/01/2008">2008</a></li>
                    <li><a data-tooltip="OE begins to work in Lesotho and Sierra Leone." href="#0" data-date="01/01/2009">2009</a></li>
                    <li><a data-tooltip="OE increases its reach to 646 schools and 400,520 students worldwide." href="#0" data-date="01/01/2010">2010</a></li>
                    <li><a data-tooltip="OE launches its Teacher Training Program." href="#0" data-date="01/01/2011">2011</a></li>
                    <li><a data-tooltip="Partnering with the Catholic Church, OE begins work in Cameroon with 10 primary programs in 4 Catholic dioceses." href="#0" data-date="01/01/2012">2012</a></li>
                    <li><a data-tooltip="OE expands to secondary education and creates tablet-based pilot programs." href="#0" data-date="01/01/2013">2013</a></li>
                    <li><a data-tooltip="OE expands our reach to 1,434 schools supporting 889,080 students." href="#0" data-date="01/01/2014">2014</a></li>
                    <li><a data-tooltip="OE launches its first pilots with the Quest Forward methodology and Quest! app prototype." href="#0" data-date="01/01/2015">2015</a></li>
                    <li><a data-tooltip="OE runs 20 Quest Forward Learning pilots in the US and Tanzania." href="#0" data-date="01/01/2016">2016</a></li>
                    <li><a data-tooltip="Quest Forward Learning runs full-year in Tanzania, Quest Forward Academies launch in US." href="#0" data-date="01/01/2017">2017</a></li>
                    <li><a data-tooltip="Next Generation Learning becomes Quest Forward Learning, expands to almost 1,000 students worldwide." href="#0" data-date="01/01/2018">2018</a></li>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->

		<ul class="cd-timeline-navigation">
			<li>
                <a href="#0" class="prev inactive">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png">
                </a>
            </li>
			<li>
                <a href="#0" class="next">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png">
            </a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol style="list-style-type:none;">
			<li class="selected" data-date="01/01/2005">
            <h3 class="u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">Ameritrade Founder and CEO Joe Ricketts travels to Tanzania</h3>
            <?php echo do_shortcode('[animation][header_card header_content="Ameritrade Founder and CEO Joe Ricketts travels to Tanzania" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"][launcher target="2005-1-popover-modal"]<img src="https://opportunityeducation.org/wp-content/uploads/2018/09/2005-1-1-900x288.png" alt="" width="1480" height="474" class="u-display--block u-margin-bottom--std alignnone size-bleed wp-image-1481" />
[/launcher]Ameritrade Founder and CEO Joe Ricketts travels to Tanzania​ for holiday. While there, he meets safari guide Shange Wilson and learns that Wilson is building a nursery and primary school. Ricketts visits the school and donates $1,400 to Wilson for its construction. Later, Ricketts sends off-the-shelf video and other educational materials to Wilson’s school in Tanzania and begins to consider how he might help other schools in Tanzania and the developing world.[/header_card][/animation]'); ?>

            <?php echo do_shortcode('[animation][header_card header_content="Opportunity Education Foundation is Established" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]
<img src="https://www.opportunityeducation.org/wp-content/uploads/2018/12/2005-oe-logo.png" alt="" width="452" height="147" class="u-display--block u-margin-bottom--std alignnone size-full wp-image-1495" />Opportunity Education Foundation is established​ with Joe Ricketts serving as CEO. Our mission is “to make quality education accessible to children indeveloping nations so they can improve their standards of living and work towards a brighter future.”[/header_card][/animation]'); ?>

<?php echo do_shortcode('[animation][header_card header_content="OE establishes the Primary School Student Program in Tanzania and Uganda" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"][launcher target="2005-3-popover-modal"]
<img src="https://opportunityeducation.org/wp-content/uploads/2018/09/2005-3-900x288.png" alt="" width="1480" height="474" class="u-display--block u-margin-bottom--std alignnone size-bleed wp-image-1483" />
[/launcher]OE establishes the Primary School Student Program in Tanzania and Uganda​, hiring Alan Barkley as executive director. Barkley begins to develop partnerships with government and private schools throughout Africa. In Uganda, OE partners with World Vision.[/header_card][/animation]'); ?>

            </li>

            <li data-date="01/01/2006">
            <h3 class="u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE expands the Primary School Student Program</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE expands the Primary School Student Program." header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE expands the Primary School Student Program.​ We begin to​​produce “Let’s Learn” video programming and supplemental educational materials filmed and developed in the US for primary schools overseas. Our programming is designed to address milestones in primary educational curricula, Forms 1-6, and covers five principal areas of study: reading, mathematics, science, creative arts, and social studies. OE ships video lessons and supplemental materials to partnering schools throughout the developing world.

[/header_card]
[/animation]'); ?>
<?php echo do_shortcode('[animation]
[header_card header_content="Working with Thembalethu Development, OE expands our work to South Africa. We also begin work in Sri Lanka," header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/South-Africa-for-2006-section-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignleft size-medium wp-image-1784" /><img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Sri-Lanka-for-2006-section.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-full wp-image-1785" />

Working with Thembalethu Development, OE expands our work to South Africa. We also begin work in Sri Lanka, ​increasing our reach to 4 countries, 30 schools, and 18,600 students.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2007">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">Jim Ricketts begins work with OE in various capacities</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="Jim Ricketts" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

Jim Ricketts ​begins work with OE in various capacities, overseeing the establishment and management of the supplies warehouse; procurement, shipping, and in-country distribution of educational materials; video production, and OE marketing.

[/header_card]
[/animation]'); ?>
<?php echo do_shortcode('[animation]
[header_card header_content="OE begins to work in Nepal, partnering with United Missions to Nepal, and in India, partnering with World Vision." header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/2007-2-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-card wp-image-1486" />

OE begins to work in Nepal, partnering with United Missions to Nepal, andin India, partnering with World Vision. ​We increasing our reach to 6 countries, 67 schools, and 41,450 students.​

[/header_card]
[/animation]'); ?>
			</li>

            <li data-date="01/01/2008">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE establishes its Sister School Program</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE establishes its Sister School Program" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE establishes its Sister School Program ​to facilitate cross-culturalunderstanding between developed and developing countries by conducting penpal correspondences between students at paired schools. In addition to letter writing, US-based schools provide much-needed educational resources and materials to their partner schools.

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/2008-1-300x236.jpg" alt="" width="300" height="236" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1489" />

We also begin running ​Sister School Trips​, a cultural exchange program, which once a year takes teachers from OE sister schools to different parts of the developing world where OE operates. Participants travel, visit, and teach in OE partner schools, and learn about the culture and people of host countries. US teachers visit Tanzania, India, Ghana, and Uganda.

[/header_card]
[/animation]'); ?>
<?php echo do_shortcode('[animation]
[header_card header_content="OE expands our work in Africa, partnering with the Students and Youth Travel Organization in Ghana" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Ghana-for-2008-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1776" />

OE expands our work in Africa, partnering with the Students and Youth Travel Organization in Ghana​, increasing our reach to 7 countries, 281 schools, and 174,220 students.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2009">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE begins to work in Lesotho and Sierra Leone</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE begins to work in Lesotho and Sierra Leone" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Lesotho-for-2009.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignleft size-full wp-image-1779" /><img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Sierra-Leonne-for-2009.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-full wp-image-1782" />

OE begins to work in Lesotho and Sierra Leone, introducing our curricula to 15 and 10 schools respectively, increasing our reach to 9 countries and 413 schools, supporting 256,060 students.
[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2010">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE increases our reach to 646 schools and 400,520 students</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE increases our reach to 646 schools and 400,520 students." header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE increases our reach to 646 schools and 400,520 students.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2011">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">In partnership with Louisiana College, OE inaugurates the OE Teacher Training Program</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="In partnership with Louisiana College, OE inaugurates the OE Teacher Training Program" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

In partnership with Louisiana College, OE inaugurates the OE Teacher
Training Program , and launches training in Tanzania. Serving approximately 200 teachers over 3 days, the program includes on-site workshops and training by international experts in education, and provides supplemental materials to support teachers in partnering countries.

[/header_card]
[/animation]'); ?>
<?php do_shortcode('[animation]
[header_card header_content="Jim Ricketts becomes president of OE" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

Jim Ricketts becomes president of OE.

[/header_card]
[/animation]'); ?>

<?php do_shortcode('[animation]
[header_card header_content="OE increases our reach to 835 schools and 517,700 students" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE increases our reach to 835 schools and 517,700 students.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2012">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE begins work in Cameroon with 10 primary programs in 4 Catholic dioceses</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="Partnering with the Catholic Church, OE begins work in Cameroon with 10 primary programs in 4 Catholic dioceses – Kumbo, Bamenda, Mamfe and Buea" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Cameroon-for-2012-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignleft size-medium wp-image-1774" /><img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Uganda-for-2012.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-full wp-image-1788" />

Partnering with the Catholic Church, OE begins work in Cameroon with 10 primary programs in 4 Catholic dioceses – Kumbo, Bamenda, Mamfe and Buea. Our Teacher Training Program expands to Uganda, serving approximately 200 teachers there.

[/header_card]
[/animation]'); ?>
<?php echo do_shortcode('[animation]
[header_card header_content="Joe Ricketts considers the use of tablets" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

Joe Ricketts considers the use of tablets in providing educational resources to schools in developing countries; OE begins to explore this as a possible avenue for our educational programming. By the end of 2012, OE increases our reach to 10 countries and 1,074 schools, enabling 665,880 students with better learning opportunities.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2013">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE initiates the Tablet Program</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE expands our educational programming to include secondary education and to explore the use of technology in achieving educational goals" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE expands our educational programming to include secondary education
and to explore the use of technology in achieving educational goals.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE initiates the Tablet Program" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE initiates the Tablet Program. Using pre-existing curricula and materials, its purpose is to assess the feasibility of working with digital curricular materials in the developing world. OE provides 10 schools in Tanzania with 2,000 tablets and educational materials in English, mathematics, science, and history for grades 9 and 10. We also designed and provided charging stations and network connectivity, enabling us to collect data on when and how the tablets are used, to assess the program’s effectiveness.<br /><br />OE’s Tablet Program illustrates the power and potential of tablet-based, personalized learning, with 2,000 students participating in it over the next two years.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE begins work in Zambia" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE begins work in Zambia, expanding our reach to 11 countries, 1,203 schools, and 745,860 students.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="Our Teacher Training Program expands to Ghana, serving approximately 200 teachers" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

Our Teacher Training Program expands to Ghana, serving approximately
200 teachers.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE partners with First Sight" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE partners with First Sight , including them on Sister School trips to
administer eye examinations and distribute glasses to students and teachers in need.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2014">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE redesigns our Teacher Training Program</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE redesigns our Teacher Training Program" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE redesigns our Teacher Training Program by “clustering” schools in countries, inviting 1-2 teachers from upwards of 40 schools in each country for teacher training workshops.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE expands our reach" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE expands our reach to 1,434 schools supporting 889,080 students.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2015">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE expands our reach</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="The Tablet Program concludes." header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

The Tablet Program concludes. OE gains important insights from the
experience and identifies challenges related to shifting the attitudes of a traditional culture of teaching and learning. We determine that <strong>1) despite challenges, technology can be successfully integrated into a developing countries’ academics, and 2) the best approach is to design new, innovative curricula and materials to meet the distinct needs of schools overseas</strong>, with a specific focus on personalization, student agency, and the development of relevant skills.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE begins to shift program philosophies" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE begins to shift program philosophies from international relief to
international education and development on a global scale.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE establishes Next Generation Learning (NGL)" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE establishes Next Generation Learning (NGL) to develop curricula and
materials for technology-based educational programming. We begin to develop the design principles that lead to Quests!—online learning projects to foster student-centered learning— the essential element of our educational philosophy and approach.<br /><br />
OE creates a platform to support quest design. Next Generation Learning takes off in June.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE identifies locals to work as designers for Tanzanian curriculum" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE identifies locals to work as designers for Tanzanian curriculum. We begin training designers in creating quests that meet the distinct student needs and national standards of Tanzania.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="In the United States OE runs a program" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Pittsburgh-PA-for-2015-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1780" />

In the United States OE runs a program in Pittsburgh, PA to test the efficacy of our Quest! designs in providing students with course content that is engaging, skills-based, and relevant. Twenty-three eleventh graders and 3 mentors participate in exploring 33 quests. The feedback is overwhelmingly positive.<br /><br />
OE begins to explore the possibility of opening NGL academies in the United State to showcase the Quest! model of education.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE expands our reach" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE expands our reach to 1,625 schools and 1,007,500 students.

[/header_card]
[/animation]'); ?>

            </li>

            <li data-date="01/01/2016">
            <h3 class="u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">OE begins to develop the Quest! app</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="OE begins to develop the Quest! app" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE begins to develop the Quest! app, so that our educational content can be made available to a broader national and global audience.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE implements short-term pilot programs in public schools across the country, continuing to test our quest designs and curriculum." header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE implements short-term pilot programs in public schools across the
country, continuing to test our quest designs and curriculum. These schools include Boystown in Omaha, NE, and Bellevue University and Burrell High School in Burrell, PA.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE begins planning for the opening of two NGL academies in the United States" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE begins planning for the opening of two NGL academies in the United
States , one in Santa Rosa, CA and another in Omaha, NE. We begin to design curricula for the academies that emphasizes the Quest! design principles and incorporates current trends and discoveries in educational research.<br /><br />
OE expands our programming to work with Winchester Thurston in Pittsburgh, PA; Robert E. Lee High School in Springfield, VA; University of Southern California, Los Angeles, California; and Launch Academy in Rockville, MD.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE expands our reach" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE expands our reach to 1,688 schools and 1,046,560 students.
Approximately 1,005 sister schools in the US and around the world partner
with OE schools in Africa and Asia.

[/header_card]
[/animation]'); ?>
            </li>

            <li data-date="01/01/2017">
            <h3 class=" u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">Pilot program of quests using tablets and newly developed NGL curriculum is conducted</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="Pilot program of quests using tablets and newly developed NGL curriculum is conducted" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/2017-1-300x200.jpg" alt="" width="300" height="200" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1499" />

Pilot program of quests using tablets and newly developed NGL curriculum
is conducted at ten schools in Tanzania; plans to expand to six additional schools in January 2018 are in the works.
[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="NGL Academies are opened in Omaha, NE and Santa Rosa, CA" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/2017-2-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1501" />

NGL Academies are opened in Omaha, NE and Santa Rosa, CA. The
academies showcase singular curricula and Quests!, promoting an innovative, student-led educational model that promotes maximum opportunities for individual exploration and inquiry.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE expands our work" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

<img src="https://opportunityeducation.org/wp-content/uploads/2018/07/Bethesda-for-2017-300x225.jpg" alt="" width="300" height="225" class="u-display--block u-margin-bottom--std alignnone size-medium wp-image-1773" />

OE expands our work, partnering with Glasgow, Fairfax, VA; Upward Bound, Bethesda, MD; and Maya Angelou Public Charter School in Washington, DC.

[/header_card]
[/animation]'); ?>

<?php echo do_shortcode('[animation]
[header_card header_content="OE begins to explore opportunities to partner with vulnerable schools" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

OE begins to explore opportunities to partner with vulnerable schools in the US and with refugee camps abroad.

[/header_card]
[/animation]'); ?>
</li>

            <li data-date="01/01/2018">
            <h3 class="u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std">Next Generation Learning becomes Quest Forward Learning</h3>
            <?php echo do_shortcode('[animation]
[header_card header_content="Next Generation Learning becomes Quest Forward Learning" header_content_tag="h4" header_content_additional_classes="u-text--heading-micro u-text--bold" header_background_color="rich_white" additional_classes="u-border-left--solid-std u-border--color-zest"]

Next Generation Learning becomes Quest Forward Learning. As the new
year began, so did a new chapter in Opportunity Education’s history. After much discussion, Mr. Ricketts encouraged the leaders of NGL to find a new signature name to reflect the long term goals of the organization and differentiate the program as a leader in improving education worldwide.<br /><br />
Thus, Quest Forward Learning was proposed. A name that both highlights a key phrase, “quests”, in OE’s work, which is used to encourage discovery-driven education, and emphasizes “forward” movement in the pursuit of one’s dreams. The same methodology, courses, and apps will be used, but now with a new name that tells our story better.

[/header_card]
[/animation]'); ?>
			</li>
		</ol>
	</div> <!-- .events-content -->


        <div class="c-container">
            <div class="c-grid">
                <div class="c-grid__column c-grid__column--12@xxs c-grid__column--6@lg">

                    <div class="<?php echo \fifteen_four\helpers\get_attributes_from_array( $content_atts ); ?>">
                        <?php echo apply_filters( 'the_content', $args['content'] ); ?>
                    </div>

                </div>
            </div>
        </div>


</<?php echo $args['tag']; ?>>
