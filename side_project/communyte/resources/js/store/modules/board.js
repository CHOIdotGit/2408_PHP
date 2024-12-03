import axios from "../../axios";

export default {
    namespace: true,
    state: ()=> ({
        boardList: []
        ,page: 0
        ,boardDetail: null
        ,lastPageFlg: false
        ,controllFlg: true
    }),
    mutations: {
        setBoardList(state, boardList) {
            state.boardList = state.boardList.concat(boardList);
        },
        setPage(state, page) {
            state.page = page;
        },    
        setBoardDetail(state, board) {
            state.boardDetail = board;
        },
        setBoardListUnshift(state, board) {
            state.boardList.unshift(board);
        },
        setControllFlg(state, flg) {
            state.controllFlg = flg;
        },
        setLastPageFlg(state, flg) {
            state.lastPageFlg = flg;
        },       
    },
    actions: {
        /**
         * 게시글 획득
         * @param {*} context
         */
        boardListPagination(context) {
            // 디바운싱 처리
            if(context.state.controllFlg && !context.state.lastPageFlg) {
                context.dispatch('user/chkTokenAndContinueProcess', () => {
                    context.commit('setControllFlg', false);
                    
                    const url = '/api/boards?page=' + context.getters['getNextPage'];
                    const config = {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                        }
                    }

                    axios.get(url, config)
                    .then(response => {
                        context.commit('setBoardList', response.data.boardList.data);
                        context.commit('setPage', response.data.boardList.current_page);
                        if(response.data.boardList.current_page >= response.data.boardList.last_page) {
                            context.commit('setLastPageFlg', true);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
                    .finally(() => {
                        context.commit('setControllFlg', true);
                    });
                }
                , {root: true});
            }
            
        },

        /**
         * 게시글 상세 정보 획득
         * 
         * @param {*} context
         * @param {int} id
         */
        showBoard(context, id) {
            context.dispatch('user/chkTokenAndContinueProcess'
            ,() => {
                const url = '/api/boards/' + id;
                const config = {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                    }
                }

            axios.get(url, config)
            .then(response => {
                // console.log(response); 콘솔로 response.data 다음에 뭘 적어야 하는지 알 수 있다
                context.commit('board/setBoardDetail', response.data.board, {root: true});
            })
            .catch(error => {
                console.error(error);
            });
            }
            , {root: true});
        },
        
    },
    getters: {
        getNextPage(state) {
            return state.page +1;
        }
    },
}