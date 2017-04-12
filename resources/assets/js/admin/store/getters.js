export default {
	completeTasks: (state) => {
		return state.tasks.filter(todo => todo.done)
	},

	totalTasks: (state) => {
		return state.tasks.length
	},

	allProducts:(state) => {
		return state.products;
	},

	onlineUsers:(state) => {
		return state.onlineUsers;
	},
}