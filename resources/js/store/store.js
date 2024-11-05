import { createStore } from "vuex";
import todo from "./todo";
const store = createStore({
    modules: {
        todo,
    },
});
export default store;
