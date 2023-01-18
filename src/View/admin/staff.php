<div id="adminLeft">
            <div id="adminMenu">
                <ul class="adminMenu" id="adminMenu1">
                    <a href="/admin/schedule"><li>주간정기일정표</li></a>
                    <a href="/admin/meal"><li>식단표</li></a>
                    <a href="/admin/program"><li>프로그램 일정표</li></a>
                    <a href="/admin/around"><li>기관 둘러보기</li></a>
                    <a href="/admin/gallery"><li>갤러리</li></a>
                    <a href="/admin/news"><li>새소식</li></a>
                    <a href="/admin/Q&A"><li>Q&A</li></a>
                    <a href="/admin/volunteer"><li>후원 및 자원봉사</li></a>
                    <a href="/admin/notice"><li>공지사항</li></a>
                </ul>
                <ul class="adminMenu" id="adminMenu2">
                    <li>관리자님</li>
                    <a href="/admin/staff"><li class="active">스태프 관리</li></a>
                    <a href="/"><li>홈페이지 이동</li></a>
                    <a href="/logout"><li>로그아웃</li></a>
                </ul>
            </div>
        </div>
        
        <div id="adminRight">
            <h2>관리자 페이지</h2>
            <section id="staffSearch">
                <h2>스태프 찾기</h2>
                <form action="/admin/staff" method="post" id="staffSearchZone">
                    <div>아이디</div>
                    <input type="text" name="id" value="<?=empty($id) ? '' : $id?>">
                    <button>찾기</button>
                </form>
                <?php
                if(!empty($search)) {
                    ?>
                    <div class="staffSearchList">
                    <div class="searchListTop">
                        <div>아이디</div>
                        <div>이름</div>
                        <div>주간정기일정표</div>
                        <div>식단표</div>
                        <div>프로그램 일정표</div>
                        <div>기관 둘러보기</div>
                        <div>앨범</div>
                        <div>새소식</div>
                        <div>Q&A</div>
                        <div>후원 및 자원봉사</div>
                        <div>공지사항</div>
                        <div>완료</div>
                    </div>
                    <?php
                    foreach($search as $key=>$data) {
                        ?>
                        <form action="/admin/staff/control" method="post">
                            <div>
                                <div><?=userCheck($search[$key]->uidx)->id?></div>
                                <div><?=userCheck($search[$key]->uidx)->name?></div>
                                <div><input type="checkbox" name="menu2" <?=$search[$key]->menu2 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu3" <?=$search[$key]->menu3 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu4" <?=$search[$key]->menu4 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu5" <?=$search[$key]->menu5 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu6" <?=$search[$key]->menu6 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu7" <?=$search[$key]->menu7 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu8" <?=$search[$key]->menu8 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu9" <?=$search[$key]->menu9 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu10" <?=$search[$key]->menu10 == 0 ? '' : 'checked'?>></div>
                                <div><button>완료</button></div>
                                <input type="hidden" name="idx" value="<?=$search[$key]->idx?>">
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                    <?php
                } else {
                    ?>
                    <div class="noSearch">
                        검색한 유저가 없습니다.
                    </div>
                    <?php
                }
                ?>
            </section>


            <?php
            if(!empty($staff)) {
                ?>
                <section id="staffControl">
                <h2>스태프 관리</h2>
                
                <div class="staffSearchList">
                    <div class="searchListTop">
                        <div>아이디</div>
                        <div>이름</div>
                        <div>주간정기일정표</div>
                        <div>식단표</div>
                        <div>프로그램 일정표</div>
                        <div>기관 둘러보기</div>
                        <div>앨범</div>
                        <div>새소식</div>
                        <div>Q&A</div>
                        <div>후원 및 자원봉사</div>
                        <div>공지사항</div>
                        <div>완료</div>
                    </div>
                    <?php
                    foreach($staff as $key=>$value) {
                        ?>
                        <form action="/admin/staff/control" method="post">
                            <div>
                                <div><?=userCheck($staff[$key]->uidx)->id?></div>
                                <div><?=userCheck($staff[$key]->uidx)->name?></div>
                                <div><input type="checkbox" name="menu2" <?=$staff[$key]->menu2 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu3" <?=$staff[$key]->menu3 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu4" <?=$staff[$key]->menu4 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu5" <?=$staff[$key]->menu5 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu6" <?=$staff[$key]->menu6 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu7" <?=$staff[$key]->menu7 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu8" <?=$staff[$key]->menu8 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu9" <?=$staff[$key]->menu9 == 0 ? '' : 'checked'?>></div>
                                <div><input type="checkbox" name="menu10" <?=$staff[$key]->menu10 == 0 ? '' : 'checked'?>></div>
                                <div><button>완료</button></div>
                                <input type="hidden" name="idx" value="<?=$staff[$key]->idx?>">
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </section>
                <?php
            }
            ?>
        </div>

        

    </div>