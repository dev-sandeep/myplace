<?php

/**
 * A class containing constants for the Database tables used by the system.
 * 
 * A class is not exactly required for this situation, that is why it's in the includes folder.
 * 
 * The class is used to provide proper scope to the constants and not let them go wild west in the global scope...
 *
 * @author Joshua Kissoon
 * @since 20140624
 */
class SystemTables
{
    const DB_TBL_MASTER = "master";
    const DB_TBL_STATE = "state";
    const DB_TBL_DISTRICT = "district";
}
