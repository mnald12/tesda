
const events = [
	{
		title : '2023 National Womens Month',
		image: 'assets/events/e1.png',
		contents : [
			'TESDA Region V joins the nation in celebrating the 2023 National Women`s Month this March with the theme, "WE for Gender Equality and Inclusive Society,"',
			'This year`s theme not only gives voice to support the advocacy but also calls for action for social transformation to ultimately end gender inequality, and for the attainment of an inclusive society which provides equal opportunities for the WE - Women and Everyone.',
			'The Philippines has long been active in its campaign for gender equality and together WE can do more for our nation!',
			'#WEcanbeEquALL',
		]
	},
	{
		title : 'PTC Sorsogon moved to Irosin',
		image: 'assets/events/e2.png',
		contents : [
			'TESDA Sorsogon starts the year with the blessing of the Provincial Training Center (PTC) in Sorsogon, located in the town of Irosin, and the new service vehicle of the Provincial Office on February 6, 2023. The celebration was headed by PTC Sorsogon Center Administrator Jason H. Olarte. In attendance were Sorsogon 2nd District Representative Wowo Fortes, Irosin Municipal Mayor Pidoy Cielo, Acting Regional Director of TESDA Region V Ruth E. Dayaweng Provincial Office of Sorsogon Director Gilda Ranido, and the administrators of Bulusan National Vocational Technical School and Sorsogon National Agricultural School, Mr. Liberato F. Esteves and Mr. Roberto C. Mendoza, respectively.',
			'Sorsogon is one of the provinces without a training center thus the establishment of PTC-Sorsogon.',
		]
	},
	{
		title : 'Grand Launching of (BIDA)',
		image: 'assets/events/e3.png',
		contents : [
			'TESDA-V participates in the Regional and Provincial Grand Launching of the Buhay Ingatan, Droga’y Ayawan (BIDA) Program of the Department of Interior and Local Government.',
			'In a continuous effort to eradicate the problem of illegal drugs, DILG launched the BIDA program in the Bicol region on January 20, 2023, at Camp BGen Simeon Ola. The program focuses on drug supply eradication through enforcement action, demand reduction through active pushing of rehabilitation, and reintegration measures for drug dependents. TESDA Regional Office V expressed its support for the program by participating in the BIDA Service Caravan and promoting the programs and services offered by the agency to support the goals of the BIDA program.',
		]
	},
	{
		title : 'Updates Scholarship for (SIS) & (BSRS)',
		image: 'assets/events/e4.png',
		contents : [
			'TESDA – V conducts pilot rollout of updates to the Scholarship Information System (SIS) and Biometric-enabled Scholarship Registration System (BSRS) on encoding of Technical Vocational Institution (TVI) Absorptive Capacity Inventory.',
			'On January 20, 2023, TESDA V spearheaded the orientation activities for the roll-out of updates to the SIS/BSRS on the encoding of TVI Absorptive Capacity Inventory. Said update intends to reduce the conflicts in the schedules of trainers by enabling them to confirm their availability prior to being included in the Absorptive Capacity Inventory of TVI.',
			'The orientation was attended by TESDA Focal Persons for Scholarship and participants from Technical Vocational Institutions from all over the region.',
		]
	}
]


const evs = document.getElementById('evs')


const d = (id, title, image) => {
	return `
		<div class="col-xl-3 col-lg-4 col-md-6 event" data-aos="zoom-in" data-aos-delay="100">
        	<div class="member">
            	<img src="${image}" class="img-fluid" />
            	<div class="member-info">
                	<div class="member-info-content">
                    	<h4 data-bs-toggle="modal" data-bs-target="#ev${id}">${title}</h4>
               		</div>
            	</div>
        	</div>
    	</div>
	`
} 

let ds = ''

for(let i = 0; i < events.length; i++){
	ds = ds + d(i, events[i].title, events[i].image)
}

evs.innerHTML = ds


const m = (title, image, contents) => {
	let conts = ''
	for(let i of contents){
		conts = conts + `<P>${i}</p>`
	}

	return `
		
        	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            	<div class="modal-content">
               		<div class="modal-header">
                  		<h2 class="modal-title" id="exampleModalLabel">
                     		Events
                  		</h2>
                  		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               		</div>
               		<div class="modal-body">
               			<div class="row">
               				<div class="col-lg-6">
               					<img src="${image}" class="img-fluid" />
               				</div>
               				<div class="col-lg-6">
               					<h2 class="modal-title">${title}</h2>
               					<br/>
               					${conts}
               				</div>
               			</div>
               		</div>
           		</div>
         	</div>
      	
	`
}

let ms =  []

for(let i = 0; i < events.length; i++){
	ms.push({id: i, el : m(events[i].title, events[i].image, events[i].contents)}) 
}

for(let i of ms){
	const md = document.createElement('div')
	md.classList.add('modal')
	md.classList.add('fade')
	md.setAttribute('tabindex', '-1')
	md.setAttribute('aria-labelledby', 'exampleModalLabel')
	md.ariaHidden = true
	md.id = 'ev'+i.id
	md.innerHTML = i.el
	document.body.appendChild(md)
}
