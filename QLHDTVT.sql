drop table if exists Co_So_Ha_Tang;

drop table if exists Don_Gia;

drop table if exists Don_Vi;

drop table if exists File_HopDong;

drop table if exists Hop_Dong;

drop table if exists Nguoi_Dung;

drop table if exists Nguoi_Dung_Don_Vi;

drop table if exists Quyen;

drop table if exists Quyen_Nguoi_Dung;

drop table if exists Tram;

/*==============================================================*/
/* Table: Co_So_Ha_Tang                                         */
/*==============================================================*/
create table Co_So_Ha_Tang
(
   CSHT_MaCSHT          varchar(10) not null,
   CSHT_TenCSHT         varchar(50) not null,
   primary key (CSHT_MaCSHT)
);

/*==============================================================*/
/* Table: Don_Gia                                               */
/*==============================================================*/
create table Don_Gia
(
   DG_MaDon             varchar(10) not null,
   HD_MaHD              varchar(10) not null,
   DG_MaHD              varchar(10) not null,
   DG_Thang             date not null,
   DG_Nam               date not null,
   DG_Gia               float(100,0) not null,
   primary key (DG_MaDon)
);

/*==============================================================*/
/* Table: Don_Vi                                                */
/*==============================================================*/
create table Don_Vi
(
   DV_MaDV              varchar(10) not null,
   DV_TenDV             varchar(20) not null,
   primary key (DV_MaDV)
);

/*==============================================================*/
/* Table: File_HopDong                                          */
/*==============================================================*/
create table File_HopDong
(
   F_MaFile             varchar(10) not null,
   HD_MaHD              varchar(10) not null,
   F_MaHD               varchar(10) not null,
   F_Loai               varchar(10) not null,
   F_NgayTao            date not null,
   F_NgaySua            date not null,
   primary key (F_MaFile)
);

/*==============================================================*/
/* Table: Hop_Dong                                              */
/*==============================================================*/
create table Hop_Dong
(
   HD_MaHD              varchar(10) not null,
   ND_MaND              varchar(10) not null,
   T_MaTram             varchar(10) not null,
   DV_MaDV              varchar(10) not null,
   HD_MaCSHT            varchar(10) not null,
   HD_MaDV              varchar(10) not null,
   HD_MaTram            varchar(10) not null,
   T_TenTram            varchar(50) not null,
   HD_NgayDangKy        date not null,
   HD_NgayHetHan        date not null,
   HD_NgayPhuLuc        date not null,
   HD_GiaGoc            float(100,0) not null,
   HD_GiaHienTai        float(100,0) not null,
   HD_SoTaiKhoan        varchar(20) not null,
   HD_TenCTK            varchar(20) not null,
   HD_TenNH             varchar(50) not null,
   HD_TenChuDauTu       varchar(20) not null,
   HD_HDScan            varchar(50) not null,
   primary key (HD_MaHD)
);

/*==============================================================*/
/* Table: Nguoi_Dung                                            */
/*==============================================================*/
create table Nguoi_Dung
(
   ND_MaND              varchar(10) not null,
   ND_MaQ               varchar(10) not null,
   ND_MaDV              varchar(10) not null,
   ND_HoTen             varchar(50) not null,
   ND_GioiTinh          varchar(20) not null,
   ND_DiaChi            varchar(100) not null,
   ND_Email             varchar(50) not null,
   ND_MatKhau           varchar(20) not null,
   ND_SDT               varchar(15) not null,
   primary key (ND_MaND)
);

/*==============================================================*/
/* Table: Nguoi_Dung_Don_Vi                                     */
/*==============================================================*/
create table Nguoi_Dung_Don_Vi
(
   ND_MaND              varchar(10) not null,
   DV_MaDV              varchar(10) not null,
   primary key (ND_MaND, DV_MaDV)
);

/*==============================================================*/
/* Table: Quyen                                                 */
/*==============================================================*/
create table Quyen
(
   Q_MaQ                varchar(50) not null,
   Q_TenQ               varchar(20) not null,
   primary key (Q_MaQ)
);

/*==============================================================*/
/* Table: Quyen_Nguoi_Dung                                      */
/*==============================================================*/
create table Quyen_Nguoi_Dung
(
   Q_MaQ                varchar(50) not null,
   ND_MaND              varchar(10) not null,
   primary key (Q_MaQ, ND_MaND)
);

/*==============================================================*/
/* Table: Tram                                                  */
/*==============================================================*/
create table Tram
(
   T_MaTram             varchar(10) not null,
   CSHT_MaCSHT          varchar(10) not null,
   T_MaCSHT             varchar(10) not null,
   T_TenTram            varchar(50) not null,
   ND_DiaChi            varchar(100) not null,
   T_TinhTrang          varchar(20) not null,
   primary key (T_MaTram)
);

alter table Don_Gia add constraint FK_Relationship_6 foreign key (HD_MaHD)
      references Hop_Dong (HD_MaHD) on delete restrict on update restrict;

alter table File_HopDong add constraint FK_luu foreign key (HD_MaHD)
      references Hop_Dong (HD_MaHD) on delete restrict on update restrict;

alter table Hop_Dong add constraint FK_Relationship_3 foreign key (ND_MaND)
      references Nguoi_Dung (ND_MaND) on delete restrict on update restrict;

alter table Hop_Dong add constraint FK_Relationship_9 foreign key (DV_MaDV)
      references Don_Vi (DV_MaDV) on delete restrict on update restrict;

alter table Hop_Dong add constraint FK_so_huu foreign key (T_MaTram)
      references Tram (T_MaTram) on delete restrict on update restrict;

alter table Nguoi_Dung_Don_Vi add constraint FK_Relationship_10 foreign key (ND_MaND)
      references Nguoi_Dung (ND_MaND) on delete restrict on update restrict;

alter table Nguoi_Dung_Don_Vi add constraint FK_Relationship_11 foreign key (DV_MaDV)
      references Don_Vi (DV_MaDV) on delete restrict on update restrict;

alter table Quyen_Nguoi_Dung add constraint FK_Relationship_12 foreign key (Q_MaQ)
      references Quyen (Q_MaQ) on delete restrict on update restrict;

alter table Quyen_Nguoi_Dung add constraint FK_Relationship_13 foreign key (ND_MaND)
      references Nguoi_Dung (ND_MaND) on delete restrict on update restrict;

alter table Tram add constraint FK_gom foreign key (CSHT_MaCSHT)
      references Co_So_Ha_Tang (CSHT_MaCSHT) on delete restrict on update restrict;
