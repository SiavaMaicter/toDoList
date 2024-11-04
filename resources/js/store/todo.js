import axios from "axios";
const state = {
    todos: null,
    err: {},
};
const getters = {
    todos: (state) => state.todos,
    err: (state) => state.err,
};
const actions = {
    getTodoList({ state, commit, dispatch }) {
        axios
            .get("/api/todos")
            .then((res) => {
                state.todos = res.data.todos;
            })
            .catch((err) => {
                state.err.message = err.response.data;
                state.err.status = err.response.status;
            });
    },
    showTodo({ state, commit, dispatch }, data) {
        return axios
            .get(`/api/todos/${data.id}`)
            .then((res) => {
                console.log(res);
                return res.data.todo;
            })
            .catch((err) => {
                state.err.message = err.response.data;
                state.err.status = err.response.status;
            });
    },
    createTodo({ state, commit, dispatch }, data) {
        axios
            .post(`/api/todos`, {
                name: data.todo.name,
                description: data.todo.description,
                deadline: data.deadline,
            })
            .then((res) => {
                return res.data;
            })
            .catch((err) => {
                state.err.message = err.response.data;
                state.err.status = err.response.status;
            });
    },
    updateTodo({ state, commit, dispatch }, todo) {
        axios
            .put(`/api/todos/${todo.id}`, {
                name: todo.name,
                description: todo.description,
                deadline: todo.deadline,
            })
            .then((res) => {
                return res.data;
            })
            .catch((err) => {
                state.err.message = err.response.data;
                state.err.status = err.response.status;
            });
    },
    deleteTodo({ state, commit, dispatch }, id) {
        axios
            .delete(`/api/todos/:${id}`)
            .then((res) => {
                return res.data;
            })
            .catch((err) => {
                state.err.message = err.response.data;
                state.err.status = err.response.status;
            });
    },
};
const mutations = {};
export default {
    state,
    mutations,
    getters,
    actions,
};
