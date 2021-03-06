DROP DATABASE IF EXISTS `greenpass`;
CREATE DATABASE `greenpass` DEFAULT character set utf8;
USE greenpass;

-- 사용자
create table user_info
(
    user_seqno bigint auto_increment
        primary key,
    user_birthday    int(8)      default 0,
    user_phone   varchar(20)      null,
    sns_mail   varchar(200)      null,
    sns_kakao   varchar(200)      null,
    sns_naver   varchar(200)      null,
    sns_apple   varchar(200)      null,
    sns_google   varchar(200)      null,
    sns_facebook   varchar(200)      null,
    sns_zalo   varchar(200)      null,
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;
    
ALTER TABLE user_info ADD COLUMN sns_facebook varchar(200) NULL;
ALTER TABLE user_info ADD COLUMN sns_zalo varchar(200) NULL;
ALTER TABLE user_info ADD COLUMN sns_mail varchar(200) NULL;
ALTER TABLE user_info ADD COLUMN lan varchar(3) NULL;


create index user_info__index_1
    on user_info (user_phone);

-- 사용자 인증정보
create table user_auth_hst
(
    user_auth_hst_seqno bigint auto_increment
        primary key,
    user_seqno    bigint      not null,
    partner_auth_seqno    bigint      not null,
    auth_type   varchar(1)      not null, -- G : GPS, B : 비콘, N : NFC

-- GPS 좌표
    location_x   varchar(200)      null,
    location_y   varchar(200)      null,

    location_name   varchar(200)      null,
    location_sub_name   varchar(200)      null,
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

-- 등록된 지점 리스트
create table partner_auth
(
    partner_auth_seqno bigint auto_increment
        primary key,
    admin_seqno    bigint      not null, -- 승인한 어드민 계정 식별자 <-- 미승인시 0
    language_code   varchar(2)      not null default 'KR', -- KR: 한국, VN: 베트남, LA: 라오스
    gps_used   varchar(1)      not null, -- Y: 1, N: 0
    beacon_used   varchar(1)      not null, -- Y: 1, N: 0
    nfc_used   varchar(1)      not null, -- Y: 1, N: 0

-- GPS 좌표
    location_x   varchar(200)      null,
    location_y   varchar(200)      null,

    location_name   varchar(200)      null,
    location_sub_name   varchar(200)      null,
    location_img   varchar(300)      null,
    
    order   int      default 0 not null, -- Y: 1, N: 0
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.5434837','126.9726973', '라화방','숙대입구점', 'http://dev-codeidea.codeidea.io/img/28.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.9482584','126.9555159', '익산시청','관공서', 'http://dev-codeidea.codeidea.io/img/28.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.9482571','126.9401467', '대한통운','익산지점', 'http://dev-codeidea.codeidea.io/img/25.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.738089','127.031539', '의정부시청','관공서', 'http://dev-codeidea.codeidea.io/img/23.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.512006','127.126777', '메가미트','방이점', 'http://dev-codeidea.codeidea.io/img/04.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.4670177','126.8592949', '메가미트','고양점', 'http://dev-codeidea.codeidea.io/img/05.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.4898891','127.4994115', '메가미트','양평점', 'http://dev-codeidea.codeidea.io/img/10.png');

-- alter table user_auth_hst add column partner_auth_seqno    bigint      not null;
-- alter table partner_auth add column order   int      default 0 not null;

-- 유저 즐겨찾기 지점 리스트
create table user_favorite
(
    user_favorite_seqno bigint auto_increment
        primary key,
    partner_auth_seqno    bigint      not null, -- 
    user_seqno    bigint      not null, -- 등록한 어드민 계정 식별자
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;



-- 휴대폰 인증 이력, 번호
create table send_sms_auth_hst
(
    hst_seqno bigint auto_increment
        primary key,
    sender_phone    varchar(100)        null, -- 전송 전화번호
    receive_phone    varchar(100)        null, -- 수신 전화번호
    user_birthday    int(8)      default 0,
    auth_code    varchar(50)      null, -- 인증번호
    create_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

create index send_sms_auth_hst__index_1
    on send_sms_auth_hst (receive_phone, user_birthday);

-- 문자 연동 이력
create table if_send_sms_hst
(
    hst_seqno bigint auto_increment
        primary key,
    sms_id          int(11)        not null, -- 
    callee    varchar(15)        null, -- 
    result_code    varchar(10)        null, -- 
    result    varchar(10)        null, -- 
    success_code    int(11)      null,
    failed_code    int(11)      null,
    send_time    varchar(50)      null, -- 
    create_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;


-- 글로벌 번역 서비스
create table translate
(
    translate_seqno bigint auto_increment
        primary key,
    detail_code          varchar(200)        not null, -- 구분
    language_code          varchar(2)        not null default 'KR', -- 
    meta_data    varchar(500)        null, -- 
    create_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;

-- 첨부 파일
create table upload_file
(
    file_seqno bigint auto_increment
        primary key,
    origin_file_name          varchar(200)        not null, -- 구분
    web_file_name          varchar(200)        not null, -- 구분
    file_type          varchar(3)        not null default 'TXT', -- 
    create_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;


-- 관리자
create table `partner`
(
    partner_seqno bigint auto_increment
        primary key,
    partner_type   varchar(2)      not null, -- BG: 국가 발주처, BL: 지역 발주처, AM: 슈퍼관리자, BR: 가맹점
    language_code   varchar(2)      not null default 'KR', -- KR: 한국, VN: 베트남, LA: 라오스
    partner_auth_seqno    bigint      null default 0, -- 승인/부가정보 입력 뒤에 발부됨

    partner_id   varchar(200)      null,
    partner_password   varchar(512)      null,
    
-- GPS 좌표
    gps_x   varchar(50)      null,
    gps_y   varchar(50)      null,
-- NFC/RFID 태깅 정보
    nfc_tag   varchar(300)      null,
-- 비콘 정보
    beacon_info   varchar(300)      null,

    -- 일반 주소
    company_address1   varchar(200)      null,
    company_address2   varchar(200)      null,
    company_address3   varchar(200)      null,

    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;
-- 관리자 > 가맹점 renamed partner_user 
create table partner_branch
(
    partner_branch_seqno bigint auto_increment
        primary key,
    partner_seqno bigint not null,
    
    status   varchar(1)      not null default 'A', -- A: 승인완료, I: 신청접수, N: 반려
    status_content   text      null, 

    business_registration_no   varchar(30)      null,
    business_registration_file   varchar(200)      null,
    company_name   varchar(200)      null,
    partner_name   varchar(100)      null,
    partner_phone   varchar(20)      null,
    company_phone   varchar(20)      null,

    -- 집계용 주소 (한국만이면 필요없으나, 글로벌 용도라 지역 그룹 집계가 언어별로 어려워 질 수 있어 분리)
    depth1   varchar(200)      null, -- ~시
    depth2   varchar(200)      null, -- ~구

    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;
-- 관리자 > 발주처
create table partner_buyer
(
    partner_branch_seqno bigint auto_increment
        primary key,
    partner_seqno bigint not null,
    
    status   varchar(1)      not null default 'A', -- A: 등록완료, I: 대기
    status_content   text      null, 

    buyer_name   varchar(200)      null, -- location_name
    director_name   varchar(100)      null, -- 담당자이름

    -- 집계용 주소 (한국만이면 필요없으나, 글로벌 용도라 지역 그룹 집계가 언어별로 어려워 질 수 있어 분리)
    depth1   varchar(200)      null, -- ~국가
    depth2   varchar(200)      null, -- ~시
    depth3   varchar(200)      null, -- ~구

    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;

-- 관리자 IP 차단 내역
create table admin_deny_ips
(
    deny_ip_seqno bigint auto_increment
        primary key,
    
    target_ip   varchar(20)      null, -- 접근 IP
    `status`   varchar(1)      not null default 'A', -- A: 사용중, D: 중단
    reason   text      null, -- 차단 사유

    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;
-- 에러 로그
create table bf_system_error
(
    error_seqno bigint auto_increment
        primary key,
    
    platform   varchar(1)      not null default 'A', -- W: 웹, A: 앱, I: API
    display   varchar(200)      null, -- 보이던 화면 + 액션있으면 액션. 구분자 ::
    cause   text      null, -- 내용
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;

create table send_mail_auth_hst
(
    hst_seqno bigint auto_increment
        primary key,
    receive_mail    varchar(100)        null, -- 수신 메일
    user_birthday    int(8)      default 0,
    auth_code    varchar(50)      null, -- 인증번호
    create_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;
