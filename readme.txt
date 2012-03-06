Dominion - The Universal Database Abstraction Layer
(c) 1999-2010 Philippe Thomassigny

Dominion is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Dominion is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Dominion.  If not, see <http://www.gnu.org/licenses/>.

----

Welcome to Dominion v8.

You need to install the dominion directory into your application somewhere accesible by your scripts to include dominion scripts.

Once the directory is installed, just call the needed scripts and build your code !

Reference, manuals, examples: http://www.webability.info/?P=dominion
Follow us on twitter: @webability5

Thank you !

----

Dominion v8 integrates DomCore v1 into its structure. DomCore files libraries are copied into include/core and include/throwables

This is the build 5

- Change the build:
  edit DB_Base.lib at the beginning and change the version number
  change this file and add comments on new build.

Important notes:
- We did tests with TableSource to store table definition into memory.
  This is useless, memory access/unserialize of a table is slower than reading the file itself (about 2x time).
  So there is no TableSource available in the code.

To do:
- Examples
- Documentation

----

Build 5: 2012//:
- Removed error in doSelectCondition: simple field order was not working

Build 4: 2011/10/24:
- The absolute dates/unix dates in DB_Join have been set to DB_Date always
- The serialize method in DB_Date now accept the array as reference
- The serialize methods added in DB_uTime
- Error corrected in DB_Date on the calculation of seconds cents for ISO dates
- DB_Table->doInsert now accept DB_Record and DB_Records
- DB_Table->doInsert now returns the inserted key if apply (subqueries does not return inserted keys, all other do)
- DB_Table->doInsert may return an array of inserted keys in case of inserting a DB_Records object
- Examples done and beautifull design

Build 3: 2010/08/24:
- Integration of DB_Base with WAMessage
- Simplification of the constructor switches with arrays (60 code lines less)
- Removed various thowable Error related to database and added a single error: DB_BaseError
- Removed DomMaskError.lib
- All DB_Base.set* methods now return $this for chaining
- Integration of DB_Cursor with WAMessage
- DB_Cursor->Exec now return $this for chaining
- Parameters implemented for ODBC into DB_Cursor->Exec method
- DB_Check now extended from WAClass, debug added, serialization done
- DB_Field now extended from WAClass, debug added, serialization done
- DB_FieldInteger with debug added and serialization done
- DB_FieldVarchar with debug added and serialization done
- DB_FieldReal with debug added and serialization done
- DB_FieldText with debug added and serialization done
- DB_FieldDate with debug added and serialization done
- DB_FieldDateTime with debug added and serialization done
- DB_FieldLOB added
- DB_Table now extended from WAClass, debug added, serialization done


Build 2: 2010/08/17:
- DB_Date messages now use WAMessage (set and get) and renamed with a DB_Date prepend
- Added defaultdateformat and defaulttimeformat to DB_Date
- DB_Date::setMessages has been removed, the WAMessage.setMessageFile should be used now
- DB_Date.setDate has been added to pass a mixed date parameter
- all DB_Date.set* methods now return $this for chaining
- setYear modified to accept year 0 too
- DB_Date::defaulttimezone is now set with server default time zone
- DB_uTime::setMessages has been removed, the WAMessage.setMessageFile should be used now
- all DB_uTime.set* methods now return $this for chaining
- static DB_uTime::init added to initialize messages
- Integrated with DomCore v5

Build 1: 2010/08/04:
- Removal of domcore, dommask and domlist
- integration of domcore last version
- DB_Date is now extended from WAClass, serial() and unserial() implemented
- DB_uTime is now extended from WAClass, serial() and unserial() implemented
- DB_Base, DB_Cursor are now extended from WAObject since they are not serializable


----

Old Builds of v7:

Build 6:
- Separation of domcore, dommask and domlist

Build 5:
- Added field Textarea type, javascript class, wajaf class, PHP class and CSS classes
- dommasklovfieldElement has been modified to encode with html entities the values of the options, since they are not into a [CDATA[
- Added BadFieldValueException for DB_Table (temporary until the library is rewritten)
- Field Format and FormatJS has been separated, JS reg exp is not always compatible with PHP reg exp :(
- Hidden field adjusted to work fine in the form
- default mode, order and key variables renamed to dommask* to not interfere with user variables
- Removed FieldCounter from DomMask.lib
- Renamed wajaf classes with InitCap
- All the Core has been revised, ordered, fixed, UML Box entries adjusted.
- WALanguage added to the Core for XML languages manipulation and compilation
- WAFile added to the Core for Files operations

Build 4:
- Added parameter 'type' to DomMask->create($type = null) to get the code as objects or as XML if $type == 'xml'
- Added 'confirm' same as 'submit' in fommaskContainer.js
- Added JSonSucces and JSonFailure to DomMask.lib
- dommaskbuttonElement.lib modified to meet buttonElement standard
- DomMaskButton.lib modified to accept name of button into constructor of dommaskbuttonElement, visible parameter not anymore valid
- skin/4gl and skin/css created, all classes added in dominion.css from wajaf
- elements and containers conditioned to use the basic container, zone and element classes
- All the elements (js, php lib, dommask class) rewritten to meet requirements of wajaf
- Hidden field added, mask modified to use extra variable as hidden fields
- All the fields modified to use RealMaskId instead of MaskId (which is the one given by programmer but not necesarly the good one)
- All the fields .visible renamed to .isvisible to not conflict with visible parameter of Element.
- Modified DB_Table.lib to catch the exception on table_exists for MySQL to use the correct exception

Build 3:
- Added DomMaskMailField.lib
- Added the default value to the text type fields into the mask creator
- WAMessage is now fully static and do not extend WAClass
- Created DomList.lib
- Copyright written in all throwables, base, list, mask and wajaf objects, and also into js/containers and js/elements
- Added example 2 of WADebug
- Containers and elements modified to adapt to the new wajaf structure with 4glnode as last parameter
- dblistContainer.js has been added from wajaf, and renamed to domlistContainer.js

Build 2:
- Added version as constant DOMINIONVERSION to WADebug.lib
- Libraries have been modified to meet the WAJAF new standards
- Added static init in WADebug, and defined NOWADEBUG to unable the debug for production sites.
- core/ directory renamed to include/
- wa/ directory renamed to core/
- Example debug.php has been added
- JS files have been moved to containers/ and elements/ into js/ directory
- .lib libraries have been moved to base/ , list/ and mask/ directories
- wajaf/ has been moved to include/wajaf/
- core/ has been moved to include/core/
- throwables has been moved to include/throwables
- __autoload.lib has been moved to include/
- The core libraries have been fixed
- Throwable.lib has been renamed as WAThrowable.lib and dependencies fixed

Build 1: 2010-01-22 / NOT STABLE
- Creation of the structure
- Added wa/ directory with the basic WebAbility core object to make Dominion work. Those objects are released under the same licence.
- Added throwables/ directory with all the Dominion exception
- Added core/ directory with all the Dominion libraries
- Added wajaf/ directory with all the wajaf-PHP libraries to build wajaf code
- Added js/ directory with the WAJAF Containers and Elements for Dominion
- Added examples/ directory to put the examples of Dominion
