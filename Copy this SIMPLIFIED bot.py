import os
import logging
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters, ContextTypes

# Setup logging
logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s', level=logging.INFO)
logger = logging.getLogger(__name__)

# Bot token (get from @BotFather)
BOT_TOKEN = "YOUR_BOT_TOKEN_HERE"

# Start command
async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    user = update.effective_user
    welcome_message = f"""
    👋 Welcome to ZewedJobs, {user.first_name}!
    
    🇪🇹 Your Gateway to Ethiopian Job Opportunities
    
    📋 Available Commands:
    /start - Show welcome message
    /jobs - Browse latest jobs
    /search - Search jobs
    /profile - Create profile
    /help - Get help
    
    💼 Start your job search now!
    """
    await update.message.reply_text(welcome_message)

# Jobs command
async def jobs(update: Update, context: ContextTypes.DEFAULT_TYPE):
    jobs_list = """
    📋 Available Jobs:
    
    1. Software Engineer - Addis Ababa - ₦25,000-40,000
    2. Marketing Manager - Addis Ababa - ₦20,000-35,000
    3. Data Analyst - Remote - ₦18,000-30,000
    4. Sales Executive - Addis Ababa - ₦15,000-25,000
    
    Reply with job number to apply!
    """
    await update.message.reply_text(jobs_list)

# Help command
async def help_command(update: Update, context: ContextTypes.DEFAULT_TYPE):
    help_text = """
    📚 Help - ZewedJobs Bot
    
    Commands:
    /start - Start the bot
    /jobs - View job listings
    /search - Search jobs
    /profile - Create profile
    /help - This message
    
    Need assistance? Contact @zewedjobs_support
    """
    await update.message.reply_text(help_text)

# Handle text messages
async def handle_message(update: Update, context: ContextTypes.DEFAULT_TYPE):
    text = update.message.text
    if text.isdigit() and int(text) in [1, 2, 3, 4]:
        await update.message.reply_text(f"✅ Application submitted for Job {text}! We'll contact you soon.")
    else:
        await update.message.reply_text("Type /help to see available commands")

# Error handler
async def error_handler(update: Update, context: ContextTypes.DEFAULT_TYPE):
    logger.error(f"Update {update} caused error {context.error}")

# Main function
def main():
    # Create application
    application = Application.builder().token(BOT_TOKEN).build()
    
    # Add command handlers
    application.add_handler(CommandHandler("start", start))
    application.add_handler(CommandHandler("jobs", jobs))
    application.add_handler(CommandHandler("help", help_command))
    
    # Add message handler
    application.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))
    
    # Add error handler
    application.add_error_handler(error_handler)
    
    # Start bot
    logger.info("Starting bot...")
    application.run_polling()

if __name__ == '__main__':
    main()
