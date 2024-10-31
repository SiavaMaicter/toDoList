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
                res.data.message
                    ? (state.message = res.data.message)
                    : (state.todos = res.data.todos);
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
