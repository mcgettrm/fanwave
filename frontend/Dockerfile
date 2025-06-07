# Use Node.js base image
FROM node:20-alpine

# Set working directory
WORKDIR /app

# Copy package files and install all deps (including dev)
COPY package*.json ./
RUN npm install

# Copy app source
COPY . .

# Expose Nuxt dev server port
EXPOSE 3000

# Start the app TODO:: Build targets for dev and production
CMD ["npm", "run", "dev"]
