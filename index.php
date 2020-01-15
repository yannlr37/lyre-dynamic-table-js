<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Lyre Dynamic Table</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
			integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/example.css">
</head>
<body>

<div class="container">
	<h1>Dynamic Table</h1>

	<div id="table-container">
		<table id="example" class="display" style="width:100%">
			<thead>
			<tr>
				<th>
					<input type="checkbox" id="masterCheckbox">
				</th>
				<th>Id</th>
				<th>Active</th>
				<th>Age</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Company</th>
				<th>email</th>
				<th>Phone</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					<input type="checkbox" class="slaveCheckbox">
				</td>
				<td>0</td>
				<td>true</td>
				<td>28</td>
				<td>Kelli Bates</td>
				<td>female</td>
				<td>DEVILTOE</td>
				<td>kellibates@deviltoe.com</td>
				<td>+1 (962) 569-2077</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>1</td>
				<td>false</td>
				<td>34</td>
				<td>Marylou Hampton</td>
				<td>female</td>
				<td>FUTURIZE</td>
				<td>marylouhampton@futurize.com</td>
				<td>+1 (942) 510-2475</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>2</td>
				<td>true</td>
				<td>35</td>
				<td>Manuela Dickson</td>
				<td>female</td>
				<td>GINK</td>
				<td>manueladickson@gink.com</td>
				<td>+1 (910) 527-3184</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>3</td>
				<td>false</td>
				<td>20</td>
				<td>Cole Guerrero</td>
				<td>male</td>
				<td>KONNECT</td>
				<td>coleguerrero@konnect.com</td>
				<td>+1 (917) 438-3194</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>4</td>
				<td>false</td>
				<td>31</td>
				<td>Joann Owen</td>
				<td>female</td>
				<td>GRONK</td>
				<td>joannowen@gronk.com</td>
				<td>+1 (820) 507-3959</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>5</td>
				<td>false</td>
				<td>29</td>
				<td>Jessie Shaw</td>
				<td>female</td>
				<td>ZOUNDS</td>
				<td>jessieshaw@zounds.com</td>
				<td>+1 (879) 543-2457</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>6</td>
				<td>true</td>
				<td>36</td>
				<td>Aline Buckner</td>
				<td>female</td>
				<td>GEOFORM</td>
				<td>alinebuckner@geoform.com</td>
				<td>+1 (916) 490-2474</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>7</td>
				<td>false</td>
				<td>25</td>
				<td>Bernadette Myers</td>
				<td>female</td>
				<td>PHOLIO</td>
				<td>bernadettemyers@pholio.com</td>
				<td>+1 (909) 426-3806</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>8</td>
				<td>true</td>
				<td>27</td>
				<td>Lesley Byrd</td>
				<td>female</td>
				<td>KONGENE</td>
				<td>lesleybyrd@kongene.com</td>
				<td>+1 (908) 531-3338</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>9</td>
				<td>false</td>
				<td>25</td>
				<td>Stanley Stuart</td>
				<td>male</td>
				<td>ESCHOIR</td>
				<td>stanleystuart@eschoir.com</td>
				<td>+1 (917) 432-2002</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>10</td>
				<td>false</td>
				<td>25</td>
				<td>Rutledge Wooten</td>
				<td>male</td>
				<td>UNCORP</td>
				<td>rutledgewooten@uncorp.com</td>
				<td>+1 (963) 595-3502</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>11</td>
				<td>false</td>
				<td>28</td>
				<td>Kelsey Skinner</td>
				<td>female</td>
				<td>ZENSURE</td>
				<td>kelseyskinner@zensure.com</td>
				<td>+1 (950) 563-335</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>12</td>
				<td>false</td>
				<td>24</td>
				<td>Mae Meyer</td>
				<td>female</td>
				<td>GEEKY</td>
				<td>maemeyer@geeky.com</td>
				<td>+1 (807) 405-253</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>13</td>
				<td>false</td>
				<td>35</td>
				<td>Kerr Chapman</td>
				<td>male</td>
				<td>OVOLO</td>
				<td>kerrchapman@ovolo.com</td>
				<td>+1 (824) 500-250</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>14</td>
				<td>true</td>
				<td>30</td>
				<td>Tanisha Everett</td>
				<td>female</td>
				<td>SPORTAN</td>
				<td>tanishaeverett@sportan.com</td>
				<td>+1 (938) 426-207</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>15</td>
				<td>false</td>
				<td>35</td>
				<td>Sharpe Yang</td>
				<td>male</td>
				<td>POLARIUM</td>
				<td>sharpeyang@polarium.com</td>
				<td>+1 (939) 564-336</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>16</td>
				<td>true</td>
				<td>23</td>
				<td>Maude Tucker</td>
				<td>female</td>
				<td>OCTOCORE</td>
				<td>maudetucker@octocore.com</td>
				<td>+1 (937) 511-231</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>17</td>
				<td>true</td>
				<td>27</td>
				<td>Robles Hoffman</td>
				<td>male</td>
				<td>JETSILK</td>
				<td>robleshoffman@jetsilk.com</td>
				<td>+1 (927) 560-318</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>18</td>
				<td>true</td>
				<td>30</td>
				<td>Ines Christensen</td>
				<td>female</td>
				<td>KOFFEE</td>
				<td>ineschristensen@koffee.com</td>
				<td>+1 (829) 506-321</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>19</td>
				<td>false</td>
				<td>28</td>
				<td>Scott Blevins</td>
				<td>male</td>
				<td>VITRICOMP</td>
				<td>scottblevins@vitricomp.com</td>
				<td>+1 (996) 468-247</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>20</td>
				<td>true</td>
				<td>28</td>
				<td>Callahan Bartlett</td>
				<td>male</td>
				<td>ELENTRIX</td>
				<td>callahanbartlett@elentrix.com</td>
				<td>+1 (860) 440-302</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>21</td>
				<td>false</td>
				<td>21</td>
				<td>Campos White</td>
				<td>male</td>
				<td>VIASIA</td>
				<td>camposwhite@viasia.com</td>
				<td>+1 (914) 402-218</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>22</td>
				<td>false</td>
				<td>25</td>
				<td>Rita Ward</td>
				<td>female</td>
				<td>AUTOMON</td>
				<td>ritaward@automon.com</td>
				<td>+1 (831) 491-233</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>23</td>
				<td>false</td>
				<td>24</td>
				<td>Peck Cardenas</td>
				<td>male</td>
				<td>ENTALITY</td>
				<td>peckcardenas@entality.com</td>
				<td>+1 (874) 412-273</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>24</td>
				<td>true</td>
				<td>20</td>
				<td>Hughes Moody</td>
				<td>male</td>
				<td>LOCAZONE</td>
				<td>hughesmoody@locazone.com</td>
				<td>+1 (830) 456-301</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>25</td>
				<td>true</td>
				<td>31</td>
				<td>Meredith Sexton</td>
				<td>female</td>
				<td>XYMONK</td>
				<td>meredithsexton@xymonk.com</td>
				<td>+1 (969) 440-239</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>26</td>
				<td>false</td>
				<td>33</td>
				<td>Travis Jenkins</td>
				<td>male</td>
				<td>EXTRO</td>
				<td>travisjenkins@extro.com</td>
				<td>+1 (880) 406-388</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>27</td>
				<td>false</td>
				<td>30</td>
				<td>Charles Lowery</td>
				<td>male</td>
				<td>KAGE</td>
				<td>charleslowery@kage.com</td>
				<td>+1 (857) 596-286</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>28</td>
				<td>false</td>
				<td>29</td>
				<td>Payne Pace</td>
				<td>male</td>
				<td>CYCLONICA</td>
				<td>paynepace@cyclonica.com</td>
				<td>+1 (815) 472-268</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>29</td>
				<td>true</td>
				<td>25</td>
				<td>Irwin Holland</td>
				<td>male</td>
				<td>OCEANICA</td>
				<td>irwinholland@oceanica.com</td>
				<td>+1 (891) 595-262</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>30</td>
				<td>true</td>
				<td>29</td>
				<td>Watson Pruitt</td>
				<td>male</td>
				<td>CUBICIDE</td>
				<td>watsonpruitt@cubicide.com</td>
				<td>+1 (866) 568-279</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>31</td>
				<td>false</td>
				<td>26</td>
				<td>Frieda Glover</td>
				<td>female</td>
				<td>DUFLEX</td>
				<td>friedaglover@duflex.com</td>
				<td>+1 (847) 413-243</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>32</td>
				<td>true</td>
				<td>33</td>
				<td>Veronica Shepard</td>
				<td>female</td>
				<td>SONGBIRD</td>
				<td>veronicashepard@songbird.com</td>
				<td>+1 (994) 531-246</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>33</td>
				<td>false</td>
				<td>34</td>
				<td>Parrish Ingram</td>
				<td>male</td>
				<td>INTERGEEK</td>
				<td>parrishingram@intergeek.com</td>
				<td>+1 (923) 572-350</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>34</td>
				<td>true</td>
				<td>21</td>
				<td>Black Ashley</td>
				<td>male</td>
				<td>BIOSPAN</td>
				<td>blackashley@biospan.com</td>
				<td>+1 (847) 578-323</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>35</td>
				<td>false</td>
				<td>38</td>
				<td>Alissa Burke</td>
				<td>female</td>
				<td>TELEQUIET</td>
				<td>alissaburke@telequiet.com</td>
				<td>+1 (961) 499-395</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>36</td>
				<td>true</td>
				<td>29</td>
				<td>Winnie Ferguson</td>
				<td>female</td>
				<td>DATAGEN</td>
				<td>winnieferguson@datagen.com</td>
				<td>+1 (827) 554-305</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>37</td>
				<td>true</td>
				<td>39</td>
				<td>Rodriquez Dillard</td>
				<td>male</td>
				<td>QIAO</td>
				<td>rodriquezdillard@qiao.com</td>
				<td>+1 (953) 500-379</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>38</td>
				<td>false</td>
				<td>33</td>
				<td>Matilda Gomez</td>
				<td>female</td>
				<td>EMERGENT</td>
				<td>matildagomez@emergent.com</td>
				<td>+1 (853) 410-234</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>39</td>
				<td>true</td>
				<td>20</td>
				<td>Jeannette Haynes</td>
				<td>female</td>
				<td>PLAYCE</td>
				<td>jeannettehaynes@playce.com</td>
				<td>+1 (852) 526-350</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>40</td>
				<td>true</td>
				<td>27</td>
				<td>Lindsay Michael</td>
				<td>male</td>
				<td>RETROTEX</td>
				<td>lindsaymichael@retrotex.com</td>
				<td>+1 (961) 442-363</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>41</td>
				<td>false</td>
				<td>32</td>
				<td>Stacy Franks</td>
				<td>female</td>
				<td>ARCTIQ</td>
				<td>stacyfranks@arctiq.com</td>
				<td>+1 (800) 458-266</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			<tr>
				<td><input type="checkbox" class="slaveCheckbox"></td>
				<td>42</td>
				<td>false</td>
				<td>30</td>
				<td>Renee Mccullough</td>
				<td>female</td>
				<td>ISOLOGIX</td>
				<td>reneemccullough@isologix.com</td>
				<td>+1 (998) 553-296</td>
				<td><i class="icon-link fa fa-edit text-primary editRowLink" title="Edit"></i>&nbsp;/&nbsp;<i class="icon-link fa fa-times text-danger deleteRowLink" title="Delete"></i></td>
			</tr>
			</tbody>
		</table>
		<div class="table-toolbar">
			<button id="clearSelection" disabled>Clear selection</button>
			&nbsp;
			<button id="deleteBtn" disabled>Delete selection</button>
			&nbsp;
			<button id="saveBtn" disabled>Save changes</button>
			&nbsp;
		</div>
	</div>

	<div id="edit-modal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">

	$(document).ready(function () {


		/* -------------------------------------------------------------------------------------------------------------
		 * Initialisation, Configuration & Customisation
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// custom function to add new row at first position
		$.fn.dataTable.Api.register('row.addFirstPos()', function(data) {
			var context = this.context;

			var currentPage = this.page();
			this.row.add(data);
			var rowCount = this.data().length - 1;
			var insertedRow = this.row(rowCount).data();
			var tempRow;

			for (var i=rowCount; i>index; i--) {
				tempRow = table.row(i-1).data();
				this.row(i).data(tempRow);
				this.row(i-1).data(insertedRow)
			}

			return this.page(currentPage).draw(false).node();
		});

		// DataTables options
		var options = {
			"pagingType": "full_numbers",
			"lengthChange": false,
			"pageLength": 10,
			"dom": 'if <"#toolbar"> <"action">rt<"bottom"lp>',
			"scrollX": true
		};

		// init DataTable
		var context = '#example';
		var table = $(context).DataTable(options);
		var selection = [];

		// customize toolbar
		var toolbarBtns = `
				<button id="addBtn">Add new row</button>
                &nbsp;
                <button id="importBtn">Import from CSV</button>
                &nbsp;
                <button id="exportBtn">Export to CSV</button>
            `;
		$("div#toolbar").html(toolbarBtns);

		/* -------------------------------------------------------------------------------------------------------------
		 * Handle Selection
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// lines multi-selection (handle checkbox click)
		$('#masterCheckbox').on('change', function(event) {
			if ($(this).is(':checked')) {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', true);
				});
				$(context + ' tr').addClass('selected');
			} else {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', false);
				});
				$(context + ' tr').removeClass('selected');
			}
			selection = table.rows('.selected')[0];
			if (selection.length > 0) {
				$('#clearSelection').prop('disabled', false);
				$('#deleteBtn').prop('disabled', false);
			} else {
				$('#clearSelection').prop('disabled', true);
				$('#deleteBtn').prop('disabled', true);
			}
		});

		$(context).on('change', '.slaveCheckbox', function(event) {
			if ($(this).is(':checked')) {
				$(this).parent('td').parent('tr').addClass('selected');
			} else {
				$(this).parent('td').parent('tr').removeClass('selected');
			}
			selection = table.rows('.selected')[0];
			if (selection.length > 0) {
				$('#clearSelection').prop('disabled', false);
				$('#deleteBtn').prop('disabled', false);
			} else {
				$('#clearSelection').prop('disabled', true);
				$('#deleteBtn').prop('disabled', true);
			}
		});

		// clear selection
		$('#clearSelection').on('click', function () {
			if (selection.length > 0) {
				$(context + ' .slaveCheckbox').each(function(index, item) {
					$(item).prop('checked', false);
				});
				$(context + ' tbody tr.selected').each(function () {
					$(this).toggleClass('selected');
				});
				selection = [];
				$('#masterCheckbox').prop('checked', false);
				$('#deleteBtn').prop('disabled', true);
			}
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Delete data (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// delete a single row
		$(context).on('click', 'tbody .deleteRowLink', function (event) {
			var row = $(this).parent('td').parent('tr');
			table.row(row).remove().draw();
		});

		// delete multi selection
		$('#deleteBtn').on('click', function () {
			table.rows('.selected').remove().draw(false);
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Add data (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// add new row
		$('#addBtn').on('click', function () {

			$.ajax({
				url: 'getHtml.php',
				method: 'get',
				data: {},
				dataType: 'json'
			}).done(function(response) {
				if (response.success) {
					var newRow = table.row.add(response.data).draw().node();
					$(newRow).addClass('editable');
				} else {
					console.error(response.message);
				}
			}).fail(function(error) {
				console.error(error);
			});
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Edit mode (client-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// edition mode
		$(context).on('click', 'tbody .editRowLink', function (event) {
			var row = $(this).parent('td').parent('tr');
			console.log(table.row(row).data());
		});

		/* -------------------------------------------------------------------------------------------------------------
		 * Save data to database (server-side)
		 * -------------------------------------------------------------------------------------------------------------
		 */

		// when save changes
		// TODO: handle this use case
		$('body').on('click', '#saveBtn', function (event) {
			event.preventDefault();
			$.ajax({
				url: 'save.php',
				method: 'post',
				data: {
					changed: changed,
					deleted: deleted
				},
				dataType: 'json'
			}).done(function (response) {
				table.ajax.reload();
			}).fail(function (error) {
				console.error(error);
			});
		});
	});
</script>
</body>
</html>