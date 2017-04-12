export default {
	PUSH_PRODUCT:(state,payload) =>{
		if(!state.postingProduct){
			state.postingProduct = true;
			axios.post('/admin/products',payload).then((response)=>{
				state.tasks.push(response.data);
				state.postingProduct = false;
			}).catch((error) => {
			    if (error.response) {
					console.log(error.response.data);
					console.log(error.response.status);
					console.log(error.response.headers);
                    state.postingProduct = false;
			    } else {

				}
			});
		}
	},

	PUSHER_TASK:(state,payload) =>{
		console.log(payload);
		console.log("woot");
		let task = state.tasks.find((task)=> payload.id == task.id);
		if(task){
			for(let prop in task){
				task[prop] = payload[prop];
			}
		} else {
			state.tasks.push(payload);
		}
	},

    GOTO:(state,action) => {
        state.currentAction.group = action.group;
        state.currentAction.description = action.description;
    },

	SAVE_TASK:(state,payload) => {
		axios.post(`/tasks/${payload.id}`,payload).then((response)=>{
			let task = state.tasks.find((task)=> payload.id == task.id);
			task = payload;
		}).catch((error) => {
			if (error.response) {
				console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);
			} else {

			}
		});
	},

	ONLINE_USERS:(state,payload) =>{
		state.onlineUsers = payload;
	},

	USER_JOINS:(state,payload) =>{
		state.onlineUsers.push(payload);
	},

	USER_LEAVES:(state,payload) =>{
		state.onlineUsers.splice(state.onlineUsers.findIndex(function(user){return payload.id == user.id}), 1);
	},

}