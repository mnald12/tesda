
const training_centers = [
	{
		center : 'ACLC College of Sorsogon, Inc.',
		address: '2F Luisa Celeste Bldg., Sulucan, Sorsogon, Sorsogon',
		email: 'aclcsorsogon@yahoo.com',
		number: '(054) 421-5233',
		qualifications: [
			'Events Management Services NC III'
		]
	},
	{
		center : 'BULUSAN NATIONAL VOCATIONAL TECHNICAL SCHOOL (BNVTS)',
		address: 'San Jose, Bulusan, Sorsogon',
		email: 'tesda.bvtsbulusan@gmail.com',
		number: '0930-693-2323',
		qualifications: [
			'Food Processing NC II',
			'Dressmaking NC II',
			'Tailoring NC II',
			'Shielded Metal Arc Welding (SMAW) NC I',
			'Shielded Metal Arc Welding (SMAW) NC II',
			'Driving NC II',
			'Bread and Pastry Production NC II',
			'Trainers Methodology Certificate Level I',
			'Commercial Cooking NC III',
			'Cookery NC II',
			'Food and Beverage Services NC II',
			'Electrical Installation Maintenance NC II',
			'Animal Production NC II (Poultry Chicken)',
			'Animal Production NC II (Swine)',
			'Organic Agriculture Production NC II',
			'Masonry NC I',
			'Tile Setting NC II',
			'Contact Tracing Level II',
			'Solar Powered Irrigation System Operation and Maintenance',
			'Community-Based Trainers Methodology Course',
			'Diploma in Hotel and Restaurant Management'
		]
	},
	{
		center : 'Juban Training Center',
		address: 'North Poblacion, Juban, Sorsogon',
		email: 'earthdiamante@yahoo.com',
		number: '0915-388-4679',
		qualifications: [
			'Dressmaking NC II',
			'Tailoring NC II'
		]
	},
	{
		center : 'Ocbian Nature Farm School, Inc.',
		address: 'Purok 1, Monte Carmelo, Castilla, Sorsogon',
		email: '',
		number: '0919-577-1379',
		qualifications: [
			'Organic Agriculture Production NC II',
			''
		]
	},
	{
		center : 'Computer Communication Development Institute, Inc.',
		address: 'Executive Village, Tugos, Sorsogon City',
		email: 'edbalasta@yahoo.com',
		number: '0917-486-750o5/421-5575',
		qualifications: [
			'Computer System Servicing NC II',
			'Electronic Products Assembly and Servicing NC II',
			'Electrical Installation Maintenance NC II',
			'Three Year Diploma Program in Software Development and Programming',
			'Three Year Diploma Program in Electronics and Computer Technology'
		]
	},
	{
		center : 'Data Base Technology College, Inc.',
		address: 'Roxas St., Gubat, Sorsogon',
		email: 'dtabasetechnology_college@yahoo.com',
		number: '0920-241-4022',
		qualifications: [
			'Electronic Products Assembly and Servicing NC II',
			'Computer System Servicing NC II',
			'Electrical Installation Maintenance NC II'
		]
	},
	{
		center : 'Meriam College of Technology, Inc. (formerly: Onda Technology Training Center, Inc.)',
		address: 'Sorcom Bldg., Burgos St., Talisay, Sorsogon City',
		email: 'meriamcollege@gmail.com',
		number: '0928-822-4009',
		qualifications: [
			'Electrical Installation Maintenance NC II',
			'PV System Installation NC II'
		]
	},
	{
		center : 'Southern Luzon Technological College Foundation Pilar, Inc.',
		address: 'Marifosque, Pilar, Sorsogon',
		email: 'sltcfpi.tpd@gmail.com',
		number: '0948-966-2033',
		qualifications: [
			'Computer Systems Servicing NC II',
			'Hilot (Wellness Massage) NC II',
			'Cookery NC II'
		]
	},
	{
		center : 'Provincial Training Center Sorsogon',
		address: 'City Hall Compound, Cabid-an, Sorsogon City',
		email: 'ptcsorsogon@tesda.gov.ph',
		number: '0912-256-0911',
		qualifications: [
			'Driving NC II',
			'Motorcycle/Small Engine Servicing NC II',
			'Agroentrepreneurship NC II',
			'Produce Organic Concoctions and Extracts',
			'(Leading to Organic Agriculture Production NC II)',
			'Tile Setting NC II',
			'Solar Powered Irrigation System Operation and Maintenance',
			'Contact Tracing Level II',
		]
	},
	{
		center : 'Quality and Safety Driving Center Corporation',
		address: 'Sitio Madan-an, Diversion Road, Bibincahan, Sorsogon City',
		email: 'qualityandsafetydriving@gmail.com',
		number: '0919-817-6264',
		qualifications: [
			'Heavy Equipment Operation (backhoe Loader) NC II',
			'Heavy Equipment Operation (Wheel Loader) NC II'
		]
	},
	{
		center : 'Sainte Trinite Academy, Inc.',
		address: 'Nava Country Farms San Pascual, Bacon Sorsogon City',
		email: 'sainte.trinite2017@gmail.com',
		number: '',
		qualifications: [
			'Agricultural Crops Production NC II '
		]
	},
	{
		center : 'SorBeep, Inc.',
		address: '191 Alegre St, Balogo, Sorsogon City',
		email: 'sorbeepincorporatedac@gmail.com',
		number: '0950-126-2913',
		qualifications: [
			'Heavy Equipment Operation (Forklift) NC II',
			'HEO (Backhoe Loader) NC II',
			'Heavy Equipment Operation (Rigid On-Highway Dump Truck) NC II',
			'HEO (Road Roller) NC II',
			'Equipment Operation (Wheel Loader) NC II'
		]
	},
	{
		center : 'Sorsogon National Agricultural School (SNAS)',
		address: 'Mayon, Castilla, Sorsogon',
		email: 'tesda.snas@gmail.com',
		number: '09499495569',
		qualifications: [
			'Dressmaking NC II',
			'Food and Beverage Services NC II',
			'Cookery NC II',
			'Computer System Servicing NC II',
			'Tailoring NC II',
			'Driving NC II',
			'Trainers Methodology Certificate Level I',
			'Shielded Metal Arc Welding (SMAW) NC I',
			'Shielded Metal Arc Welding (SMAW) NC II',
			'Organic Agriculture Production NC II ',
			'Animal Production NC II (Swine) ',
			'Animal Production NC II (Poultry Chicken)',
			'Electrical Installation Maintenance NC III',
			'Electrical Installation Maintenance NC II',
			'Agricultural Crops Production NC III',
			'Agroentrepreneurship NC II',
			'Agroentrepreneurship NC III',
			'Masonry NC I',
			'Masonry NC II',
			'Tile Setting NC II'
		]
	},
	{
		center : 'St. Louise de Marillac College of Sorsogon, Inc. - Gubat',
		address: 'Brgy. Cogon, Gubat, Sorsogon',
		email: 'marillac_sor@yahoo.com',
		number: '(056) 311 1031',
		qualifications: [
			'Tile Setting NC II (Old)',
			'Bread and Pastry Production NC II',
			'Cookery NC II'
		]
	},
	{
		center : 'St. Louise De Marillac College of Sorsogon, Inc. - Talisay',
		address: 'Events Management Services NC III',
		email: 'marillac_sor@yahoo.com',
		number: '056-4215557',
		qualifications: [
			'Events Management Services NC III',
			'Bookkeeping NC III',
			'Cookery NC II',
			'Food and Beverage Services NC II',
			'Bread and pastry Production NC II',
			'Computer Systems Servicing NC II'
		]
	},
]

training_centers.sort((a, b) => {
	if(a.center < b.center) return -1
	else return 1
	return 0
}); 


const tc = document.getElementById('tc')

const t = (id, center) => {
	return `
		<div class="col-xl-3 col-lg-4 col-md-6 shadow p-3 pb-5 bg-body rounded m-2 position-relative list">
            <p class="title">${center}</p>
            <button class="btn btn-outline-secondary btn-tesda" data-bs-toggle="modal" data-bs-target="#tc${id}">
                View qualifications
            </button>
        </div>
	`
}

let ts = ''

for(let i = 0; i < training_centers.length; i++){
	ts += t(i, training_centers[i].center)
}

tc.innerHTML = ts

const mtc = (center, address, email, number, qualifications) => {

	qualifications.sort((a, b) => {
		if(a < b) return -1
		else return 1
		return 0
	}); 

	let conts = ''
	for(let i of qualifications){
		conts = conts + `<li>${i}</li>`
	}

	return `
		<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  	<h4 class="modal-title" id="exampleModalLabel">Training Center</h4>
                  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="alert alert-dark" role="alert">
                     <h2>${center}</h2>
                     <h6>
                        Location : <strong>${address}</strong>
                     </h6>
                     <h6>Email : <strong>${email}</strong></h6>
                     <h6>Contact : <strong>${number}</strong></h6>
                  </div>
                  <div class="alert alert-light" role="alert">
                  	<h3>Qualifications</h3>
                     ${conts}
                  </div>
               </div>
            </div>
         </div>
	`
}

let tss =  []

for(let i = 0; i < training_centers.length; i++){
	tss.push({id: i, el : mtc(training_centers[i].center, training_centers[i].address, training_centers[i].email, training_centers[i].number, training_centers[i].qualifications)}) 
}

for(let i of tss){
	const md = document.createElement('div')
	md.classList.add('modal')
	md.classList.add('fade')
	md.setAttribute('tabindex', '-1')
	md.setAttribute('aria-labelledby', 'exampleModalLabel')
	md.ariaHidden = true
	md.id = 'tc'+i.id
	md.innerHTML = i.el
	document.body.appendChild(md)
}