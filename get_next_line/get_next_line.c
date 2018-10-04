/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   get_next_line.c                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/07/16 18:19:06 by shcohen           #+#    #+#             */
/*   Updated: 2018/10/04 18:58:10 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "get_next_line.h"

char	*ft_read_line(const int fd, char *save, char *tmp)
{
	char	buf[BUFF_SIZE + 1];
	int		lus; // caractères lus

	while ((lus = read(fd, buf, BUFF_SIZE)) > 0)
	{
		buf[lus] = '\0';
		tmp = save; // leaks
		save = ft_strjoin(save, buf); // récupération des éléments de lecture
		if (tmp)
			free(tmp); // leaks
		if (ft_strchr(save, '\n'))// pour arrêter la lecture
			break ; // = return(save);
	}
	if (lus == -1)
		return (0);
	return (save);
}

int		get_next_line(const int fd, char **line)
{
	static char	*save = 0; // récupération des éléments de lecture
	char		*tmp;
	int			i;

	if (fd < 0 || !line)
		return (-1);
	tmp = NULL;
	i = 0;
	if (!save)
		save = ft_strdup(""); // 1er appel de save (save = vide)
	if (!ft_strchr(save, '\n'))
		save = ft_read_line(fd, save, tmp);
	if (!save)
		return (-1);
	while (save && save[i])
	{
		if (save[i] != '\n')
			i++;
		else if (save[i] == '\n')
		{
			*line = ft_strsub(save, 0, i);
			tmp = save; // leaks
			save = ft_strsub(save, i + 1, ft_strlen(save));
			if (tmp)
				free(tmp); // leaks
			return (1);
		}
	}
	*line = save;
	save = 0;
	return (!(!i));
}
