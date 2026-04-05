const URL_API = window.location.hostname === 'wsl.localhost' ||  window.location.hostname === 'localhost' ? 'http://127.0.0.1:8000/': ''

const getURL = () => URL_API+'api/'

const getUser = () =>{
	user = localStorage.getItem("_user");

	if (!user) return false

	return JSON.parse(user)
}

const api = async (data = {}) => {
	try {
		// Validations
		if (!data.url) throw new Error("url required")

		// Add security data
		data.user = getUser()

		const URL = URL_API+'api/'
		const type = data.type ? data.type : 'get'
		const _url = URL+data.url
		delete data.type
		delete data.url

		// Build request
		let request = {
			method: type,
			url: _url,
			headers: data.headers ?? {
				'Content-Type': 'application/json',
			}
		}

		// console.log('request', request);
		
		if (type === 'get') {
			request.params = data
		}else{
			request.data = data
		}

		// Call API
		const res = await axios(request)

		// Error
		if (res.status > 299) {
			let message = 'Error'
			
			throw new Error(message)
		}

		// Resp
		return res
	} catch (err) {
		console.log('Error - api', err);
		
		let message = err
		if (err.response) {
			if (err.response.data)
				if (err.response.data.message) message = err.response.data.message

			switch (err.response.status) {
				case 409: 
					message = 'Usuario duplicado'
					break;
				case 403: 
					message =  'Usuario inactivo'
					break;
				case 404: 
					message =  (err.config.url.search("login") !== -1) ? 'Datos incorrectos' : 'Sin información'
					break;
				default: 
					message = 'Error'
					break;
			}
		}

		throw new Error(message)
	}
}

const uploadImage = () =>{
	console.log('uploadImage')
}
