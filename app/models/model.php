<?php

class Model{
    protected $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host='.MYSQL_HOST.';'.'dbname='.MYSQL_DB.';charset=utf8',MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }
    function deploy(){
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables)==0){
            $sql = <<< END
            -- Estructura de tabla para la tabla `platos`
            --
            
            CREATE TABLE `platos` (
              `plato_id` int(11) NOT NULL,
              `categoria_id` int(11) NOT NULL,
              `nombre_plato` varchar(50) NOT NULL,
              `ingredientes` varchar(50) NOT NULL,
              `tiempo_coccion` varchar(50) DEFAULT NULL,
              `origen` varchar(45) NOT NULL,
              `precio` int(11) NOT NULL,
              `foto` varchar(200) DEFAULT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla `platos`
            --
            
            INSERT INTO `platos` (`plato_id`, `categoria_id`, `nombre_plato`, `ingredientes`, `tiempo_coccion`, `origen`, `precio`, `foto`) VALUES
            (12, 4, 'Salsa de chile habanero', '3 chiles habaneros.\n2 jitomates.\n1 pizca de sal.\n1 diente de ajo.', '5 minutos', 'mexicano', 800, NULL),
            (13, 4, 'Salsa macha', '30 gr de chile de árbol seco.\r\n3 dientes de ajo.\r\n1 cda sopera de ajonjolí.\r\n1 pizca de sal de grano.\r\n¾ de pizca de sal de grano.\r\n50 gr de cacahuete (opcional).\r\n', '5 minutos', 'mexicano', 700, NULL),
            (14, 4, 'Salsa cacahuete picante', '100 gr de cacahuetes pelados sin sal.\r\n5 piezas de chile guajillo.\r\n3 piezas de chile de árbol.\r\n1 diente de ajo.\r\n¼ cebolla blanca.\r\n20 ml de aceite.\r\n60 gr de mayonesa.\r\n40 ml de leche.\r\n1 pizca de sal.\r\n1 pizca de pimienta negra molida.', '5 minutos', 'mexicano', 800, NULL),
            (16, 5, 'BIZCOCHO NARANJA AMARGA', '300 gr. mermelada naranja amarga\r\n6 huevos\r\n300 gr. azúcar\r\n250 gr. almendras molidas\r\n1 cucharada levadura\r\nAzúcar glasé para espolvorear', '35 minutos', 'español', 1500, NULL),
            (17, 5, 'Mermelada de naranjas amargas sevillanas', 'Naranjas amargas sevillanas\r\nAzúcar, 1 kilo por cada kilo de mezcla resultante\r\nAgua', '2 dias', 'español', 700, NULL),
            (18, 3, 'Salsa Gastrique', 'El zest de una naranja y unas supremas (gajos de naranja sin piel) para decorar\r\nZumo de 4 naranjas (unos 20 cl)\r\n5 cl de vinagre de manzana o de vino blanco\r\n2 cucharadas de miel o azúcar\r\n4 dl de fondo oscuro de carne o 1cdta. de Bovril diluida en 4dl de agua caliente.', '7 minutos', 'frances', 1100, NULL),
            (20, 3, ' Copa de frutas con nata a la francesa', '250 gr de fresas (preferiblemente ser sous-vide)\r\n200gr de nata para montar (35%MG)\r\n1 barqueta de arándanos\r\n17 gr de azúcar\r\nazúcar vainillado o 1 vaina de vainilla', '5 minutos', 'frances', 1300, NULL),
            (21, 2, 'Desayuno con brioche y fresas compotadas en cocott', '2 rebanas de brioche\r\n100 gr de fresas (frescas o sous-vide)\r\n2 yemas de huevo\r\n1 vaso de leche entera\r\n1 nuez de mantequilla\r\n1 cucharada sopera de azúcar\r\ncanela al gusto\r\n2 cucharadas soperas de nata agria', '10 minutos', 'frances', 2000, NULL),
            (22, 2, 'Crema de almendras ', '200 gr de azúcar\r\n200 gr de almendras en polvo\r\n200 gr de mantequilla en “punto pomada”\r\n4 huevos enteros\r\n1 vaina de vainilla\r\n1 cucharada de ron\r\n1 pizca de sal', '5 minutos', 'frances', 900, NULL),
            (23, 1, 'Crema dubarry', 'Coliflor\r\n1\r\nCebolla\r\n0.5\r\nPuerro\r\n1\r\nPatata mediana\r\n1\r\nMantequilla\r\n15 g\r\nPimienta negra molida\r\nCaldo de pollo\r\n600 ml\r\nVinagre de vino blanco\r\n30 ml\r\nYema de huevo\r\n1\r\nNata líquida\r\n100 ml\r\nAceite de oliva virgen extra\r\nSal', '50 minutos', 'frances', 1700, NULL),
            (25, 1, 'Suflé o souffle de queso y pimiento', 'Pimiento rojo asado\r\n60 g\r\nQueso cheddar\r\n100 g\r\nMantequilla\r\n55 g\r\nHarina de trigo\r\n55 g\r\nLeche\r\n300 ml\r\nHuevo\r\n4\r\nPimienta blanca molida\r\nNuez moscada molida\r\nSal', '50 minutos', 'frances', 800, NULL);
            
            -- --------------------------------------------------------
            --
            -- Indices de la tabla `platos`
            --
            ALTER TABLE `platos`
              ADD PRIMARY KEY (`plato_id`),
              ADD KEY `platos_ibfk_1` (`categoria_id`);
            
            --
            -- Indices de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
              ADD PRIMARY KEY (`id_user`);
            
            --
            -- AUTO_INCREMENT de las tablas volcadas
            --
            
            --
            -- AUTO_INCREMENT de la tabla `categoria`
            --
            ALTER TABLE `categoria`
              MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
            
            --
            -- AUTO_INCREMENT de la tabla `platos`
            --
            ALTER TABLE `platos`
              MODIFY `plato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
            
            --
            -- AUTO_INCREMENT de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
              MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
            
            --
            -- Restricciones para tablas volcadas
            --
            
            --
            -- Filtros para la tabla `platos`
            --
            ALTER TABLE `platos`
              ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`);
            COMMIT;
            
            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
            
        END;
            $this->db->query($sql);
        }
    }
}