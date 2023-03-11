

const services = [
	{
		title : 'NC Renewal',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when renewing your NC in the Main office',
		requirements : [
			'Duly Accomplished Application Form',
			'Photocopy of NC (with Original copy presented)',
			'1 passport size picture with collar and white background, printed on quality photo paper',
			'1 passport size picture with name printed below (Surname, First name, MI), printed on quality photo paper',
			'Certificate of work and or teaching experience for at least 12 months during the validity period of the NC in the relevant qualification and duly signed by the employer and or school administrator',
			'Indicate the duties and responsibilities',
			'For Self-Employed: Business Permit, Mayors Permit, BIR Registration, DTI Registration.'
		]
	},
	{
		title : 'COC Renewal',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when renewing your COC in the Main office',
		requirements : [
			'Duly Accomplished Application Form',
			'Photocopy of COC (with Original copy presented)',
			'1 passport size picture with collar and white background, printed on quality photo paper',
			'1 passport size picture with name printed below (Surname, First name, MI), printed on quality photo paper',
			'Certificate of work and or teaching experience for at least 12 months during the validity period of the COC in the relevant qualification and duly signed by the employer and or school administrator',
			'Indicate the duties and responsibilities',
			'For Self-Employed: Business Permit, Mayors Permit, BIR Registration, DTI Registration.'
		]
	},
	{
		title : 'TMC Renewal',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when renewing your TMC in the Main office',
		requirements : [
			'Duly Accomplished Application Form',
			'Photocopy of TMC (with Original copy presented)',
			'1 passport size picture with collar and white background, printed on quality photo paper',
			'1 passport size picture with name printed below (Surname, First name, MI), printed on quality photo paper',
			'Certificate of work and or teaching experience for at least 12 months during the validity period of the TMC in the relevant qualification and duly signed by the employer and or school administrator',
			'Indicate the duties and responsibilities',
			'For Self-Employed: Business Permit, Mayors Permit, BIR Registration, DTI Registration.'
		]
	},
	{
		title : 'NTTC I Renewal',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when renewing your NTTC I in the Main office',
		requirements : [
			'Duly Accomplished Application Form',
			'Photocopy of TMC (with Original copy presented)',
			'1 passport size picture with collar and white background, printed on quality photo paper',
			'1 passport size picture with name printed below (Surname, First name, MI), printed on quality photo paper',
			'Certificate of work and or teaching experience for at least 12 months during the validity period of the TMC in the relevant qualification and duly signed by the employer and or school administrator',
			'Indicate the duties and responsibilities',
			'For Self-Employed: Business Permit, Mayors Permit, BIR Registration, DTI Registration.'
		]
	},
	{
		title : 'APPLICATION FOR NTTC I',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when applying for NTTC I in the Main office',
		requirements : [
			'Accomplished Application Form (Trainer`s/Assessor`s Profile)',
			'Photocopy of Diploma/Official Transcript of Records',
			'Photocopy of National Certificate II or higher',
			'Photocopy of Trainer`s Methodology Certificate I (TMI)',
			'Certificate of Employment as required on the TR',
			'Passport size picture, wearing shirt with collar, colored and in white background (2-pcs) (with nametag: Surname, First name, MI)',
			'Notarized CoCie (with certified true copy of attached documents)'
		]
	},
	{
		title : 'APPLICATION FOR ASSESSMENT',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when applying for Assessment in the Main office',
		requirements : [
			'Duly Accomplished Application Form',
			'Self Assessment Guide',
			'1 passport size picture with collar and white background, printed on quality photo paper',
			'1 passport size picture with name printed below (Surname, First name, MI), printed on quality photo paper',
			'Certificate of work and /or training experience in the relevant qualification and duly signed by the employer and /or school administrator.',
			'for Driving - photocopy of Driver`s License'
		]
	},
	{
		title : 'APPLICATION FOR CAV',
		note : 'The purpose of this service is to check if your requirements is all correct to prevents you from bringing the wrong requirements when applying for Certification, Authentication & Verification (CAV) in the Main office',
		requirements : [
			'Transcript of Records-Original & two (2) certified photocopy of school-(for employment purpose)',
			'Diploma Original & two (2) certified photocopy of the school',
			'Picture "2 x 2", passport size, wearing shirt with collar, colored and in white background (3-pcs)',
			'Documentary Stamp-PhP 15.00/set (2 sets)'
		]
	},
]



const s = (id, title) => {
	return `
		<div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
                <div class="icon">
                    <i class="bx bi-file-earmark-richtext"></i>
                </div>
                <h3 class="title">${title}</h3>
                <button type="button" data-bs-toggle="modal" data-bs-target="#serv${id}" class="btn btn-primary">
                   Check requirements
                </button>
            </div>
        </div>
	`
}

const sc = document.getElementById('sc')

let ss = ''

for(let i = 0; i < services.length; i++){
	ss = ss + s(i, services[i].title)
}

sc.innerHTML = ss



const r = (title, notes, requirements) => {
	let conts = ''
	for(let i of requirements){
		conts = conts + `<li>${i}</li>`
	}

	return `
		<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               	<div class="modal-header">
                  	<h3 class="modal-title" id="exampleModalLabel">${title}</h3>
                  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               	</div>
               	<div class="modal-body">
               		<div class="col-lg-12 row">
                     	<div class="col-lg-6">
                        	<div class="alert alert-warning" role="alert">
                           		<strong>NOTE</strong> : ${notes}
                           	</div>
                        	<div class="alert alert-secondary" role="alert">
                           		<h3>REQUIREMENTS</h3>
                           		${conts}
                        	</div>
                     	</div>
                     	<div class="col-lg-6">
                        	<div class="mb-3">
                           		<label for="formFile" class="form-label">Full Name</label>
                           		<input class="form-control" type="email" id="formFile"/>
                        	</div>
                        	<div class="mb-3">
                           		<label for="formFile" class="form-label">Email</label>
                           		<input class="form-control" type="text" id="formFile"/>
                        	</div>
                        	<div class="mb-3">
                        		<label for="formFile" class="form-label">Number</label>
                           		<input class="form-control" type="number" id="formFile"/>
                           	</div>
                           	<div class="alert alert-warning" role="alert">
                           		<strong>NOTE</strong> : Make sure to Upload all image / pictures of your requirements
                        	</div>
                        	<div class="mb-3">
                        		<label for="formFileMultiple" class="form-label">Upload all your files here : (Select all)</label>
                           		<input class="form-control" type="file" id="formFileMultiple" multiple />
                        	</div>
                        	<button class="btn btn-success" onclick="showFiles()">
                        		Submit
                        	</button>
                     	</div>
                  	</div>
               	</div>
            </div>
        </div>
      	
	`
}

let rs =  []

for(let i = 0; i < services.length; i++){
	rs.push({id: i, el : r(services[i].title, services[i].note, services[i].requirements)}) 
}

for(let i of rs){
	const md = document.createElement('div')
	md.classList.add('modal')
	md.classList.add('fade')
	md.setAttribute('tabindex', '-1')
	md.setAttribute('aria-labelledby', 'exampleModalLabel')
	md.ariaHidden = true
	md.id = 'serv'+i.id
	md.innerHTML = i.el
	document.body.appendChild(md)
}
