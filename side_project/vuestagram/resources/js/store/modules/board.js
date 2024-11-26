import axios from "../../axios";
// import router from '../../router';

export default {
    namespaced: true,
    state: ()=> ({
        boardList: [],
        page: 0,
    }),
    mutations: {
        setBoardList(state, boardList) {
            state.boardList = boardList;
        },
        setPage(state, page) {
            state.page = page;
        },
    },
    actions: {
        /**
         * 게시글 획득
         * 
         * @param {*} context
         * 
         */
        getBoardListPagenation(context) {
            const url = '/api/boards?page=' + context.getters['getNextPage'];
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }
            
            axios.get(url, config)
            .then(response => {
                // console.log(response);
                context.commit('setBoardList', response.data.boardList.data);
                context.commit('setPage', response.data.boardList.current_page);
            })
            .catch(error => {
                console.error(error);
            });
        },
       
    },
    getters: {
        getNextPage(state) {
            return state.page + 1;
        }
    },
}