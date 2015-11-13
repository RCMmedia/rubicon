<p>
With the following shoftcode you can insert your <strong>Everyone's Schedule</strong> view into a post or a page. 
</p>

<p>
<code>[<?php echo $shortcode; ?>]</code>
</p>

<p>
By default, this view will display the current week shifts calendar. 
If need to, you can adjust it by supplying additional parameters to control the display:
</p>

<ul class="hc-list-separated hc-list-indented">
	<li>
		<strong>date</strong>: <em>yyyymmdd</em>, for example <em>20140901</em>. If not supplied, it will start from the current date.
	</li>
	<li>
		<strong>range</strong>
		<ul style="margin-left: 1em;">
			<li>
				<em>week</em>
				<p>
				It will display the week calendar with shifts starting from Sunday (or Monday) of the current week regardless of the current week day.
				</p>
			</li>
			<li>
				<em>month</em>
				<p>
				It will display the month calendar with shifts starting from the 1st of the current month regardless of the current date.
				</p>
			</li>
			<li>
				Time range, for example <em>5 days</em>, <em>2 weeks</em>
				<p>
				It will display the list of shifts starting from the date specified in the <strong>date</strong> parameter and within the range given. If no <strong>date</strong> is giving, it will start from today.
				</p>
			</li>
		</ul>
	</li>
	<li>
		<strong>location</strong>: <em>location id</em>, for example <em>2</em>. You can find out the id of a location in <em>Configuration &gt; Locations</em>. If not supplied, it will display shifts of all locations.
		You can also supply several ids separated by comma. 
	</li>
	<li>
		<strong>staff</strong>: <em>staff id</em>, for example <em>3</em>. You can find out the id of an employee in <strong>Users</strong>. If not supplied, it will display shifts of all employees.
		You can also supply several ids separated by comma. 
	</li>

	<li>
		<strong>route</strong>
		<p>
		This parameter defines the default area where the visitor gets to by going to the page with ShiftController shortcode.
		</p>

		<ul style="margin-left: 0em;">
			<li>
				<em>list</em>
				<p>
				The only option available for not logged in visitors. 
				It will display everyone's shifts (the <strong>Full Schedule</strong> page).
				</p>
			</li>
			<li>
				<em>listme</em>
				<p>
				The default option for logged in employees. 
				It will display the shifts of the currently logged in user (the <strong>My Schedule</strong> page).
				</p>
			</li>
			<li>
				<em>list-toff</em>
				<p>
				Available for logged in employees only. It will display the list of the employee's timeoff requests (the <strong>Timeoff Requests</strong> page).
				</p>
			</li>
		</ul>
	</li>
</ul>

<p>
Examples
</p>

<p>
Month calendar for September in location #2:
</p>

<p>
<code>[<?php echo $shortcode; ?> date="20150901" range="month" location="2"]</code>
</p>

<p>
Week calendar for the current week:
</p>

<p>
<code>[<?php echo $shortcode; ?> range="week"]</code>
</p>

<p>
List shifts in the next 3 days:
</p>

<p>
<code>[<?php echo $shortcode; ?> range="3 days"]</code>
</p>

<p>
Make the Full Schedule page a default view for a logged in employee (instead of the My Schedule page):
</p>

<p>
<code>[<?php echo $shortcode; ?> route="list"]</code>
</p>
